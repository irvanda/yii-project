<?php
/**
 * CPSComponentBehavior class file.
 *
 * @author Jerry Ablan <jablan@pogostick.com>
 * @link http://ps-yii-extensions.googlecode.com
 * @copyright Copyright &copy; 2009 Pogostick, LLC
 * @license http://www.pogostick.com/license/
 */

/**
 * CPSComponentBehavior provides base component behaviors to other classes
 *
 * @author Jerry Ablan <jablan@pogostick.com>
 * @version SVN: $Id: CPSComponentBehavior.php 243 2009-06-13 01:34:31Z jerryablan@gmail.com $
 * @package psYiiExtensions
 * @subpackage Behaviors
 * @filesource
 * @since 1.0.1
 */
class CPSComponentBehavior extends CBehavior
{
	//********************************************************************************
	//* Member Variables
	//********************************************************************************

	/**
	* An instance of our option manager for this behavior
	*
	* @var (@link CPSOptionManager)
	* @access private
	*/
	private $m_oOptions;
	/**
	* The internal name of the component. Used as the name of the behavior when attaching.
	*
	* In order to facilitate option separation, this value is used along with the prefix delimiter by the internal option
	* manager to distinguish between owners. During construction, it is set to the name of
	* the class, and includes special behavior for Pogostick classes. Example: CPSComponent
	* becomes psComponent. Use or override (@link setInternalName) to change the name at
	* runtime.
	*
	* @var string
	* @see setInternalName
	* @see $m_sPrefixDelimiter
	* @access protected
	*/
	protected $m_sInternalName;
	/**
	* The delimiter to use for prefixes. This must contain only characters that are not allowed
	* in variable names (i.e. '::', '||', '.', etc.). Defaults to '::'. There is no length limit,
	* but 2 works out. There is really no need to ever change this unless you have a strong dislike
	* of the '::' characters.
	*
	* @var string
	* @access protected
	*/
	protected static $m_sPrefixDelimiter = '::';

	//********************************************************************************
	//* Property Accessors
	//********************************************************************************

	/**
	* Getters for member variables
	*
	*/
	public function getInternalName() { return $this->m_sInternalName; }
	public function getNamePrefix() { return $this->m_sInternalName . $this->m_sPrefixDelimiter; }
	public function getPrefixDelimiter() { return $this->m_sPrefixDelimiter; }
	public function getValidPattern() { return $this->m_arValidPattern; }

	/**
	* Setters for member variables
	*
	*/
	public function setInternalName( $sValue ) { $this->m_sInternalName = $sValue; }
	public function setValidPattern( $arValue ) { $this->m_arValidPattern = $arValue; }

	//********************************************************************************
	//* Constructor
	//********************************************************************************

	/**
	* Constructor
	*
	*/
	public function __construct()
	{
		//	Get our name...
		$_sName = CPSCommonBase::createInternalName( $this );

		//	build our option manager...
		$this->m_oOptions = new CPSOptionManager( $this->m_sInternalName );

		//	Set up our base settings
			$this->addOptions( self::getBaseOptions() );

		//	Set the external library path
		$this->extLibUrl = Yii::app()->getAssetManager()->publish( Yii::getPathOfAlias( 'pogostick' ) . '/external', true );

		//	Log it and check for issues...
		CPSCommonBase::writeLog( Yii::t( $_sName, '{class} constructed', array( "{class}" => get_class( $this ) ) ), 'trace', $_sName );

		//	Preinitialize if available
		if ( method_exists( $this, 'preinit' ) )
			$this->preinit();
	}

	//********************************************************************************
	//* Property Access Methods
	//********************************************************************************

	/**
	* Retrieves an option value from the options array. If key doesn't exist, it's created as an empty array and returned.
	*
	* @param string $sKey
	* @param array $arValue
	* @param bool $bNoSort If set to false, the option array will not be sorted after the addition
	* @see addOptions
	*/
	public function addOption( $sKey, $arValue, $bNoSort = false, $oSetValue = null ) { return $this->m_oOptions->addOption( $sKey, $arValue, $bNoSort, $oSetValue ); }

	/**
	* Add a batch of options to the option manager
	*
	* @param array $arOptions
	* @see addOption
	*/
	public function addOptions( $arOptions ) { return $this->m_oOptions->addOptions( $arOptions ); }

	/**
	* Sets the default (@link $m_sPrefixDelimiter). Defaults to '::'.
	*
	* @param string $sValue
	*/
	public function setPrefixDelimiter( $sValue ) { $this->m_sPrefixDelimiter = $sValue; }

	/**
	* Add bulk options to the manager.
	*
	* @param array $arOptions An array containing option_key => value pairs to put into option array. The parameter $arOptions is merged with the existing options array. Existing option values are overwritten or added.
	* <code>
	* $this->setOptions( array( 'option_x' => array( CPSOptionManager::META_DEFAULTVALUE => '1', CPSOptionManager::META_RULES => array( 'valid' => array( 'x', 'y', 'z' ) ) );
	* </code>
	* @returns null
	* @see getOptions
	*/
	public function setOptions( array $arOptions ) { $this->m_oOptions->setOptions( $arOptions ); }

	/**
	* Sets a single option to the array
	*
	* @param string $sKey
	* @param mixed $oValue
	* @return null
	* @see setOptions
	*/
	public function setOption( $sKey, $oValue ) {  $this->m_oOptions->setOption( $sKey, $oValue ); }

	/**
	* Returns a reference to the entire reference array
	*
	* @returns array A reference to the internal options array
	* @see getOption
	*/
	public function &getOptions() { return $this->m_oOptions->getOptions(); }

	/**
	* Returns a copy of only the public options within the options array
	*
	* @returns array A copy of the public options stored...
	* @see getOptions
	*/
	public function getPublicOptions() { return $this->m_oOptions->getPublicOptions(); }

	/**
	* Retrieves an option value from the options array. If key doesn't exist, it's created as an empty array and returned.
	*
	* @param string $sKey
	* @return mixed
	* @see getOptions
	*/
	public function &getOption( $sKey ) { return $this->m_oOptions->getOption( $sKey ); }

	/**
	* Returns a reference to the entire reference array
	*
	* @returns array A reference to the internal options array
	* @see getOption
	*/
	public function &getOptionsObject() { return $this->m_oOptions; }

	/**
	* Checks if an option exists in the options array...
	*
	* @param string $sKey
	* @return bool
	* @see setOption
	* @see setOptions
	*/
	public function hasOption( $sKey ) { return $this->m_oOptions->hasOption( $sKey ); }

	/**
	* Merges the supplied options into parent's option array. No checking is done at the time. It's a blind merge.
	*
	* @param array $arOptions
	*/
	public function mergeOptions( array $arOptions )
	{
		$this->getOptionsObject()->mergeOptions( $arOptions );
	}

	//********************************************************************************
	//* Public Methods
	//********************************************************************************

	/**
	* Easier on the eyes
	*
	* @access private
	*/
	private function getBaseOptions()
	{
		return(
			array(
				'baseUrl_' => array( CPSOptionManager::META_DEFAULTVALUE => '', CPSOptionManager::META_RULES => array( CPSOptionManager::META_TYPE => 'string' ) ),
				'checkOptions_' => array( CPSOptionManager::META_DEFAULTVALUE => true, CPSOptionManager::META_RULES => array( CPSOptionManager::META_TYPE => 'boolean' ) ),
				'validOptions_' => array( CPSOptionManager::META_DEFAULTVALUE => array(), CPSOptionManager::META_RULES => array( CPSOptionManager::META_TYPE => 'string' ) ),
				'checkCallbacks_' => array( CPSOptionManager::META_DEFAULTVALUE => true, CPSOptionManager::META_RULES => array( CPSOptionManager::META_TYPE => 'boolean' ) ),
				'validCallbacks_' => array( CPSOptionManager::META_DEFAULTVALUE => array(), CPSOptionManager::META_RULES => array( CPSOptionManager::META_TYPE => 'string' ) ),
				'callbacks_' => array( CPSOptionManager::META_DEFAULTVALUE => array(), CPSOptionManager::META_RULES => array( CPSOptionManager::META_TYPE => 'string' ) ),
				'extLibUrl_' => array( CPSOptionManager::META_DEFAULTVALUE => '/', CPSOptionManager::META_RULES => array( CPSOptionManager::META_TYPE => 'string' ) ),
			)
		);
	}

  /**
    * Checks the callback array to see if they're valid.
    *
    * @throws CException
    * @returns true If all is good.

    */
	public function checkCallbacks()
	{
		$_arCallbacks = $this->callbacks;
		$_arValidCallbacks = $this->validCallbacks;

		if ( ! empty( $_arCallbacks ) && ! empty( $_arValidCallbacks ) )
		{
			foreach ( $_arCallbacks as $_sKey => $_oValue )
			{
				if ( ! in_array( $_sKey, $_arValidCallbacks ) )
					throw new CException( Yii::t( __CLASS__, '"{x}" must be one of: {y}', array( '{x}' => $_sKey, '{y}' => implode( ', ', $_arValidCallbacks ) ) ) );
			}
		}

		//	Clean...
		return true;
	}

	/**
	* Generates the options for the widget
	*
	* @param array $arOptions
	* @return string
	*/
	public function makeOptions()
	{
		//	Get the public options...
		$_arOptions = $this->m_oOptions->getPublicOptions();
		
		//	Check them first...
		$this->checkOptions( $_arOptions );

		//	Get our public options...
		$_arCallbacks = $this->callbacks;

		//	Add callbacks to the array...
		foreach ( $_arCallbacks as $_sKey => $_oValue )
		{
			if ( ! empty( $_oValue ) )
				$_arOptions[ "cb_{$_sKey}" ] = $_sKey;
		}

		//	Get all the options merged...
		$_arToEncode = array();

		//	Now build our final array...
		foreach( $_arOptions as $_sKey => $_oValue )
		{
			//	Skip nulls...
			if ( $_sKey != 'callbacks' && isset( $_arOptions[ $_sKey ] ) )
			{
				$_sExtName = $this->getOptionsObject()->getMetaDataValue( $_sKey, CPSOptionManager::META_EXTERNALNAME );
				
				if ( empty( $_sExtName ) )
					$_sExtName = $_sKey;

				//	Check for callbacks in the inner array (.i.e. "buttons" from jqUI dialog)
				if ( is_array( $_oValue ) )
				{
					foreach ( $_oValue as $_sKey1 => $_oValue1 )
					{
						if ( $this->isCBFunction( $_oValue1 ) )
						{
							//	Remove from options and move to callbacks..
							$_oValue[ 'cb_' . $_sKey1 ] = $_sKey1;
							unset( $_oValue[ $_sKey1 ] );
							$_arCallbacks[ '!!!' . $_sKey1 ] = $_oValue1;
						}
					}
				}
					
				$_arToEncode[ $_sExtName ] = $_oValue;
			}
		}

		if ( sizeof( $_arToEncode ) > 0 )
		{
			$_sEncodedOptions = CJavaScript::encode( $_arToEncode );

			//	Fix up the callbacks...
			foreach ( $_arCallbacks as $_sKey => $_oValue )
			{
				$_sQuote = null;
				
				//	Indicator to quote key...
				if ( '!!!' == substr( $_sKey, 0, 3 ) )
				{
					$_sQuote = "'";
					$_sKey = substr( $_sKey, 3 );
				}
				
				if ( ! empty( $_oValue ) )
				{
					if ( $this->isCBFunction( $_oValue ) )
						$_sEncodedOptions = str_replace( "'cb_{$_sKey}':'{$_sKey}'", "{$_sQuote}{$_sKey}{$_sQuote}:{$_oValue}", $_sEncodedOptions );
					else
						$_sEncodedOptions = str_replace( "'cb_{$_sKey}':'{$_sKey}'", "{$_sKey}:'{$_oValue}'", $_sEncodedOptions );
				}
			}

			return( $_sEncodedOptions );
		}

		return( null );
	}

	/**
	* Checks options for validity based on the meta data rules (if any)
	*
	* @returns bool
	*/
	public function checkOptions( $arOptions = null )
 	{
 		if ( null == $arOptions ) $arOptions = $this->m_oOptions->getPublicOptions();
		return $this->getOptionsObject()->checkOptions( $arOptions );
	}

	/**
	* Checks for an empty variable.
	*
	* Useful because the PHP empty() function cannot be reliably used with overridden __get methods.
	*
	* @param mixed $oVar
	* @return bool
	*/
	public function isEmpty( $oVar )
	{
		return empty( $oVar );
	}

	//********************************************************************************
	//* Magic Methods
	//********************************************************************************

	/**
	 * Returns a property value, an event handler list or a behavior based on its name.
	 * Do not call this method. This is a PHP magic method that we override
	 * to allow using the following syntax to read a property or obtain event handlers:
	 * <code>
	 * $value=$component->propertyName;
	 * $handlers=$component->eventName;
	 * </code>
	 *
	 * Will also return a property from an attached behavior directly without the need for using the behavior name
	 * <code>
	 * $value = $component->behaviorPropertyName;
	 * </code>
	 * instead of
	 * <code>
	 * $value = $component->behaviorName->propertyName
	 * </code>
	 * @param string the property name or event name
	 * @return mixed the property value, event handlers attached to the event, or the named behavior
	 * @throws CException if the property or event is not defined
	 * @see __set
	 * @see getBehaviorProperty
	 */
	public function __get( $sName )
	{
		//	Is it a member variable?
		if ( in_array( $sName, array_keys( get_class_vars( get_class( $this ) ) ) ) )
			return $this->{$sName};
			
		if ( $this->hasOption( $sName ) )
			return $this->getOption( $sName );
			
		//	Try daddy...
		return parent::__get( $sName );
	}

	/**
	 * Sets value of a component property.
	 * Do not call this method. This is a PHP magic method that we override
	 * to allow using the following syntax to set a property or attach an event handler
	 * <pre>
	 * $this->propertyName=$value;
	 * $this->eventName=$callback;
	 * </pre>
	 *
	 * Will also set a property value in an attached behavior directly without the need for using the behavior name
	 * <pre>
	 * $this->behaviorPropertyName = $value;
	 * </pre>
	 * @param string the property name or the event name
	 * @param mixed the property value or callback
	 * @throws CException if the property/event is not defined or the property is read only.
	 * @see __get
	 * @see setBehaviorProperty
	 */
	public function __set( $sName, $oValue )
	{
		if ( $this->hasOption( $sName ) )
			return $this->setOption( $sName, $oValue );
			
		return parent::__set( $sName, $oValue );
	}
	
	/**
	* Check to see if the value follows a callback function pattern
	* 	
	* @param string $sValue
	*/
	protected function isCBFunction( $sValue )
	{
		return ( 0 == strncasecmp( $sValue, 'function(', 9 ) || 0 == strncasecmp( $sValue, 'jQuery(', 7 ) || 0 == strncasecmp( $sValue, '$(', 2 ) );
	}
	
	/**
	* Redirect event to owner object
	* 
	* This doesn't actually raise an event. What it does is calls the 
	* owner's event raiser method. That method will then raise the event.
	* 
	* @param string $sName The event name
	* @param CPSApiEvent $oEvent The event
	*/
	public function raiseEvent( $sName, $oEvent )
	{
		//	Save called name...
		$_sOrigName = $sName;
		
		//	Handler exists? Call it
		if ( method_exists( $this->owner, $sName ) )
			return call_user_method( $sName, $this->owner, $oEvent );
	
		//	See if pre-handler exists...
		if ( 0 === strncmp( 'on', $sName, 2 ) )
			$sName = substr( $sName, 2 );

		$sName{0} = strtolower( $sName{0} );

		if ( method_exists( $this->owner, $sName ) )
			return call_user_method( $sName, $this->owner, $oEvent );
			
		//	Not there? Throw error...
		return parent::raiseEvent( $sName, $oEvent );
		//throw new CException( Yii::t( $this->m_sInternalName, 'Event "{class}.{event}" is not defined.', array( '{class}' => get_class( $this->owner ), '{event}' => $_sOrigName ) ) );
	}

}