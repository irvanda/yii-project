<?php
/**
 * CPScURLObject class file.
 *
 * @author Jerry Ablan <jablan@pogostick.com>
 * @link http://ps-yii-extensions.googlecode.com
 * @copyright Copyright &copy; 2009 Pogostick, LLC
 * @license http://www.pogostick.com/license/
 */

/**
 * CPScURLObject provides a wrapper class for the cURL libraries
 *
 * @author Jerry Ablan <jablan@pogostick.com>
 * @version SVN: $Id: CPScURLObject.php 190 2009-05-24 01:01:47Z jerryablan $
 * @package psYiiExtensions
 * @subpackage Base
 * @since 1.0.0
 */
class CPScURLObject
{
	//********************************************************************************
	//* Constants
	//********************************************************************************

	const PSCURL_TIMEOUT = 3;

	//********************************************************************************
	//* Member Variables
	//********************************************************************************

    protected static $m_oInstance = null;
    protected static $m_iSingleton = 0;
    protected static $m_ocURL;
    protected static $m_sMsgs;
    protected static $m_bRunning;
    protected static $m_arRequests = array();
    protected static $m_arResponses = array();
    protected static $m_arProperties = array();

	//********************************************************************************
	//* Constructor
	//********************************************************************************

	function __construct()
	{
		if ( 0 == self::$m_iSingleton )
			throw new Exception( 'This class must be instantiated by using the CPScURLObject::getInstance() method.');

		self::$m_ocURL = curl_multi_init();

		self::$m_arProperties = array(
			'code' => CURLINFO_HTTP_CODE,
			'time' => CURLINFO_TOTAL_TIME,
			'length' => CURLINFO_CONTENT_LENGTH_DOWNLOAD,
			'type' => CURLINFO_CONTENT_TYPE,
		);
	}

	//********************************************************************************
	//* Static Methods
	//********************************************************************************

	public static function getInstance()
	{
		if ( null == self::$m_oInstance )
		{
			self::$m_iSingleton = 1;
			self::$m_oInstance = new CPScURLObject();
		}

		return self::$m_oInstance;
	}

	//********************************************************************************
	//* Public Methods
	//********************************************************************************

	public function addCurl( $oHandle )
	{
		$_sKey = ( string )$oHandle;
		self::$m_arRequests[ $_sKey ] = $oHandle;

		$_oRes = curl_multi_add_handle( self::$m_ocURL, $oHandle );
		if ( CURLM_OK === $_oRes || CURLM_CALL_MULTI_PERFORM === $_oRes )
		{
			do
			{
				$_oRes = curl_multi_exec( self::$m_ocURL, $_bAction );
			}
			while ( CURLM_CALL_MULTI_PERFORM === $_oRes );

			return new CPScURLObject( $_sKey );
		}

		return $_oRes;
	}

	public function getResult( $sKey = null )
	{
		if ( null != $sKey && isset( self::$m_arResponses[ $sKey ] ) )
			return self::$m_arResponses[ $sKey ];

		$_running = null;

		do
		{
			$_oResp = curl_multi_exec( self::$m_ocURL, $_runningCurrent );

			if ( null !== $_running && $_runningCurrent != $_running )
			{
				$this->storeResponses( $sKey );

				if ( isset( self::$m_arResponses[ $sKey ] ) )
					return self::$m_arResponses[ $sKey ];
			}

			$_running = $_runningCurrent;
		}
		while( $_runningCurrent > 0 );

		return false;
	}

	//********************************************************************************
	//* Private Methods
	//********************************************************************************

	private function storeResponses()
	{
		while ( $_oData = curl_multi_info_read( self::$m_ocURL ) )
		{
			$_sKey = ( string )$_oData[ 'handle' ];
			self::$m_arResponses[ $_sKey ][ 'data' ] = curl_multi_getcontent( $_oData[ 'handle' ] );

			foreach ( self::$m_arProperties as $_sName => $_oValue )
			{
				self::$m_arResponses[ $_sKey ][ $_sName ] = curl_getinfo( $_oData[ 'handle' ], $_oValue );
				curl_multi_remove_handle( self::$m_ocURL, $_oData[ 'handle' ] );
			}
		}
	}
}