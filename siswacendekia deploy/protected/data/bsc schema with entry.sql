SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `bsc` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `bsc` ;

-- -----------------------------------------------------
-- Table `bsc`.`User`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bsc`.`User` ;

CREATE  TABLE IF NOT EXISTS `bsc`.`User` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `username` VARCHAR(25) NOT NULL ,
  `password` VARCHAR(128) NOT NULL ,
  `salt` VARCHAR(128) NULL ,
  UNIQUE INDEX `Username_UNIQUE` (`username` ASC) ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bsc`.`orangtua`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bsc`.`orangtua` ;

CREATE  TABLE IF NOT EXISTS `bsc`.`orangtua` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nama_ayah` VARCHAR(45) NULL ,
  `tempat_lahir_ayah` VARCHAR(45) NULL ,
  `tanggal_lahir_ayah` DATE NULL ,
  `pekerjaan_ayah` VARCHAR(45) NULL ,
  `no_telp_ayah` VARCHAR(45) NULL ,
  `email_ayah` VARCHAR(45) NULL ,
  `facebook_ayah` VARCHAR(45) NULL ,
  `nama_ibu` VARCHAR(45) NULL ,
  `tempat_lahir_ibu` VARCHAR(45) NULL ,
  `tanggal_lahir_ibu` DATE NULL ,
  `alamat_ayah` TEXT NULL ,
  `alamat_ibu` TEXT NULL ,
  `pekerjaan_ibu` VARCHAR(45) NULL ,
  `no_telp_ibu` VARCHAR(45) NULL ,
  `email_ibu` VARCHAR(45) NULL ,
  `facebook_ibu` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bsc`.`Customer`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bsc`.`Customer` ;

CREATE  TABLE IF NOT EXISTS `bsc`.`Customer` (
  `User_id` INT NOT NULL ,
  `nama` VARCHAR(50) NOT NULL ,
  `tanggal_lahir` DATE NULL ,
  `tempat_lahir` VARCHAR(45) NULL ,
  `alamat_rumah` VARCHAR(50) NOT NULL ,
  `asal_sekolah` VARCHAR(15) NOT NULL ,
  `alamat_sekolah` VARCHAR(50) NOT NULL ,
  `kelas_jurusan` VARCHAR(15) NOT NULL ,
  `no_hp` VARCHAR(15) NOT NULL ,
  `email` VARCHAR(45) NULL ,
  `facebook` VARCHAR(45) NULL ,
  `anak_ke` INT NULL ,
  `jumlah_saudara` INT NULL ,
  `cita_cita` TEXT NULL ,
  `hobi` TEXT NULL ,
  `moto` TEXT NULL ,
  `mapel_disukai` TEXT NULL ,
  `mapel_tidak_disukai` TEXT NULL ,
  `orangtua_id` INT NOT NULL ,
  `status` ENUM('diterima', 'belum diterima', 'tidak diterima') NOT NULL DEFAULT 'belum diterima',
  INDEX `fk_Customer_orangtua1` (`orangtua_id` ASC) ,
  PRIMARY KEY (`User_id`) ,
  CONSTRAINT `fk_Customer_orangtua1`
    FOREIGN KEY (`orangtua_id` )
    REFERENCES `bsc`.`orangtua` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Customer_User1`
    FOREIGN KEY (`User_id` )
    REFERENCES `bsc`.`User` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bsc`.`Pengajar`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bsc`.`Pengajar` ;

CREATE  TABLE IF NOT EXISTS `bsc`.`Pengajar` (
  `User_id` INT NOT NULL ,
  `nama_lengkap` VARCHAR(50) NOT NULL ,
  `nama_panggilan` VARCHAR(25) NULL ,
  `alamat_rumah` TEXT NOT NULL ,
  `alamat_kost` TEXT NULL ,
  `no_hp` VARCHAR(45) NOT NULL ,
  `no_rekening` VARCHAR(45) NULL ,
  `fakultas` VARCHAR(45) NULL ,
  `jurusan` VARCHAR(45) NULL ,
  `status` ENUM('diterima', 'belum diterima', 'tidak diterima') NOT NULL DEFAULT 'belum diterima',
  `angkatan` VARCHAR(45) NULL ,
  `ipk` VARCHAR(45) NULL ,
  `tempat_lahir` VARCHAR(45) NULL ,
  `tanggal_lahir` DATE NULL ,
  `kemampuan_bahasa` TEXT NULL ,
  `hobby` LONGTEXT NULL ,
  `cita_cita` LONGTEXT NULL ,
  `karakter` LONGTEXT NULL ,
  `kendaraan` VARCHAR(45) NULL ,
  PRIMARY KEY (`User_id`) ,
  INDEX `fk_Pengajar_User1` (`User_id` ASC) ,
  CONSTRAINT `fk_Pengajar_User1`
    FOREIGN KEY (`User_id` )
    REFERENCES `bsc`.`User` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bsc`.`Feedback`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bsc`.`Feedback` ;

CREATE  TABLE IF NOT EXISTS `bsc`.`Feedback` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `konten` LONGTEXT NOT NULL ,
  `tanggal` DATETIME NOT NULL ,
  `Customer_User_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_Feedback_Customer1` (`Customer_User_id` ASC) ,
  CONSTRAINT `fk_Feedback_Customer1`
    FOREIGN KEY (`Customer_User_id` )
    REFERENCES `bsc`.`Customer` (`User_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bsc`.`Jadwal_Belajar`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bsc`.`Jadwal_Belajar` ;

CREATE  TABLE IF NOT EXISTS `bsc`.`Jadwal_Belajar` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `hari` ENUM('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu') NOT NULL ,
  `jam_mulai` TIME NOT NULL ,
  `jam_selesai` TIME NOT NULL ,
  `pelajaran` VARCHAR(35) NOT NULL, 
  `Customer_User_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_Jadwal_Belajar_Customer1` (`Customer_User_id` ASC) ,
  CONSTRAINT `fk_Jadwal_Belajar_Customer1`
    FOREIGN KEY (`Customer_User_id` )
    REFERENCES `bsc`.`Customer` (`User_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bsc`.`Pelajaran`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bsc`.`Pelajaran` ;

CREATE  TABLE IF NOT EXISTS `bsc`.`Pelajaran` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nama_pelajaran` VARCHAR(20) NULL ,
  `tingkatan` INT,
  `harga` DOUBLE NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bsc`.`Jadwal_Mengajar`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bsc`.`Jadwal_Mengajar` ;

CREATE  TABLE IF NOT EXISTS `bsc`.`Jadwal_Mengajar` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `hari` ENUM('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu') NOT NULL ,
  `jam_mulai` TIME NOT NULL ,
  `jam_selesai` TIME NOT NULL ,
  `Pengajar_User_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_Jadwal_Mengajar_Pengajar1` (`Pengajar_User_id` ASC) ,
  CONSTRAINT `fk_Jadwal_Mengajar_Pengajar1`
    FOREIGN KEY (`Pengajar_User_id` )
    REFERENCES `bsc`.`Pengajar` (`User_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bsc`.`Log_Mengajar`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bsc`.`Log_Mengajar` ;

CREATE  TABLE IF NOT EXISTS `bsc`.`Log_Mengajar` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `tanggal` DATE NOT NULL ,
  `jam_mulai` TIME NOT NULL ,
  `jam_selesai` TIME NOT NULL ,
  `deskripsi` LONGTEXT NOT NULL ,
  `Pengajar_User_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_Log_Mengajar_Pengajar1` (`Pengajar_User_id` ASC) ,
  CONSTRAINT `fk_Log_Mengajar_Pengajar1`
    FOREIGN KEY (`Pengajar_User_id` )
    REFERENCES `bsc`.`Pengajar` (`User_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bsc`.`Tagihan`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bsc`.`Tagihan` ;

CREATE  TABLE IF NOT EXISTS `bsc`.`Tagihan` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `bulan` VARCHAR(2) NOT NULL ,
  `tahun` VARCHAR(4) NOT NULL,
  `status_pembayaran` TINYINT(1)  NOT NULL DEFAULT 0,
  `persetujuan` TINYINT(1)  NOT NULL DEFAULT 1,
  `Customer_User_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_Tagihan_Customer1` (`Customer_User_id` ASC) ,
  CONSTRAINT `fk_Tagihan_Customer1`
    FOREIGN KEY (`Customer_User_id` )
    REFERENCES `bsc`.`Customer` (`User_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bsc`.`barisTagihan`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bsc`.`Baris_Tagihan` ;

CREATE  TABLE IF NOT EXISTS `bsc`.`Baris_Tagihan` (
  `ID` INT NOT NULL AUTO_INCREMENT ,
  `details` LONGTEXT NULL ,
  `biaya` DOUBLE NOT NULL ,
  `date` DATE NOT NULL ,
  `Tagihan_id` INT NOT NULL ,
  `status` TINYINT(1)  NOT NULL ,
  PRIMARY KEY (`ID`) ,
  INDEX `fk_Baris_Tagihan_Tagihan1` (`Tagihan_id` ASC) ,
  CONSTRAINT `fk_Baris_Tagihan_Tagihan1`
    FOREIGN KEY (`Tagihan_id` )
    REFERENCES `bsc`.`Tagihan` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bsc`.`Laporan`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bsc`.`Laporan` ;

CREATE  TABLE IF NOT EXISTS `bsc`.`Laporan` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `detail` LONGTEXT NOT NULL ,
  `date` DATE NOT NULL ,
  `Pengajar_User_id` INT NOT NULL ,
  `Customer_User_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_Laporan_Pengajar1` (`Pengajar_User_id` ASC) ,
  INDEX `fk_Laporan_Customer1` (`Customer_User_id` ASC) ,
  CONSTRAINT `fk_Laporan_Pengajar1`
    FOREIGN KEY (`Pengajar_User_id` )
    REFERENCES `bsc`.`Pengajar` (`User_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Laporan_Customer1`
    FOREIGN KEY (`Customer_User_id` )
    REFERENCES `bsc`.`Customer` (`User_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bsc`.`Informasi`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bsc`.`Informasi` ;

CREATE  TABLE IF NOT EXISTS `bsc`.`Informasi` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `title` VARCHAR(45) NOT NULL ,
  `create_time` DATETIME,
  `update_time` DATETIME,
  `content` LONGTEXT NOT NULL ,
  `author_id` INTEGER NOT NULL,
  `tags` TEXT,
  `status` ENUM('Draft', 'Published', 'Archive') NOT NULL ,

  PRIMARY KEY (`id`),
  CONSTRAINT fk_informasi_user1 
        FOREIGN KEY (author_id)
		REFERENCES `bsc`.`user` (id) ON DELETE CASCADE ON UPDATE RESTRICT)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bsc`.`Jadwal_Belajar_Mengajar`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bsc`.`Jadwal_Belajar_Mengajar` ;

CREATE  TABLE IF NOT EXISTS `bsc`.`Jadwal_Belajar_Mengajar` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `hari` ENUM('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu') NOT NULL ,
  `jam_mulai` TIME NOT NULL ,
  `jam_selesai` TIME NOT NULL ,
  `Pengajar_User_id` INT,
  `pelajaran` LONGTEXT NOT NULL ,
  `Customer_User_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_Jadwal_Belajar_Mengajar_Pengajar1` (`Pengajar_User_id` ASC) ,
  INDEX `fk_Jadwal_Belajar_Mengajar_Customer1` (`Customer_User_id` ASC) ,
  CONSTRAINT `fk_Jadwal_Belajar_Mengajar_Pengajar1`
    FOREIGN KEY (`Pengajar_User_id` )
    REFERENCES `bsc`.`Pengajar` (`User_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Jadwal_Belajar_Mengajar_Customer1`
    FOREIGN KEY (`Customer_User_id` )
    REFERENCES `bsc`.`Customer` (`User_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bsc`.`Image`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bsc`.`Image` ;

CREATE  TABLE IF NOT EXISTS `bsc`.`Image` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `image` LONGTEXT NOT NULL ,
  `dates` TIMESTAMP NOT NULL ,
  `User_ID` INT ,
  `Informasi_idInformasi` INT,
  PRIMARY KEY (`id`) ,
  INDEX `fk_Images_User1` (`User_ID` ASC) ,
  INDEX `fk_Images_Informasi1` (`Informasi_idInformasi` ASC) ,
  CONSTRAINT `fk_Images_User1`
    FOREIGN KEY (`User_ID` )
    REFERENCES `bsc`.`User` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Images_Informasi1`
    FOREIGN KEY (`Informasi_idInformasi` )
    REFERENCES `bsc`.`Informasi` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bsc`.`Role`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bsc`.`Role` ;

CREATE  TABLE IF NOT EXISTS `bsc`.`Role` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `role` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bsc`.`Program`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bsc`.`Program` ;

CREATE  TABLE IF NOT EXISTS `bsc`.`Program` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nama_program` VARCHAR(128) NOT NULL ,
  `deskripsi_program` LONGTEXT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bsc`.`Pengajar_has_Pelajaran`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bsc`.`Pengajar_has_Pelajaran` ;

CREATE  TABLE IF NOT EXISTS `bsc`.`Pengajar_has_Pelajaran` (
  `Pengajar_User_id` INT NOT NULL ,
  `Pelajaran_id` INT NOT NULL ,
  PRIMARY KEY (`Pengajar_User_id`, `Pelajaran_id`) ,
  INDEX `fk_Pengajar_has_Pelajaran_Pelajaran1` (`Pelajaran_id` ASC) ,
  CONSTRAINT `fk_Pengajar_has_Pelajaran_Pengajar1`
    FOREIGN KEY (`Pengajar_User_id` )
    REFERENCES `bsc`.`Pengajar` (`User_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Pengajar_has_Pelajaran_Pelajaran1`
    FOREIGN KEY (`Pelajaran_id` )
    REFERENCES `bsc`.`Pelajaran` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bsc`.`User_has_Role`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bsc`.`User_has_Role` ;

CREATE  TABLE IF NOT EXISTS `bsc`.`User_has_Role` (
  `User_id` INT NOT NULL ,
  `Role_id` INT NOT NULL ,
  PRIMARY KEY (`User_id`, `Role_id`) ,
  INDEX `fk_User_has_Role_Role1` (`Role_id` ASC) ,
  CONSTRAINT `fk_User_has_Role_User1`
    FOREIGN KEY (`User_id` )
    REFERENCES `bsc`.`User` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_User_has_Role_Role1`
    FOREIGN KEY (`Role_id` )
    REFERENCES `bsc`.`Role` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bsc`.`Pelajaran_has_Customer`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bsc`.`Pelajaran_has_Customer` ;

CREATE  TABLE IF NOT EXISTS `bsc`.`Pelajaran_has_Customer` (
  `Pelajaran_id` INT NOT NULL ,
  `Customer_User_id` INT NOT NULL ,
  PRIMARY KEY (`Pelajaran_id`, `Customer_User_id`) ,
  INDEX `fk_Pelajaran_has_Customer_Customer1` (`Customer_User_id` ASC) ,
  CONSTRAINT `fk_Pelajaran_has_Customer_Pelajaran1`
    FOREIGN KEY (`Pelajaran_id` )
    REFERENCES `bsc`.`Pelajaran` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Pelajaran_has_Customer_Customer1`
    FOREIGN KEY (`Customer_User_id` )
    REFERENCES `bsc`.`Customer` (`User_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bsc`.`Program_has_Customer`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bsc`.`Program_has_Customer` ;

CREATE  TABLE IF NOT EXISTS `bsc`.`Program_has_Customer` (
  `Program_id` INT NOT NULL ,
  `Customer_User_id` INT NOT NULL ,
  PRIMARY KEY (`Program_id`, `Customer_User_id`) ,
  INDEX `fk_Program_has_Customer_Customer1` (`Customer_User_id` ASC) ,
  CONSTRAINT `fk_Program_has_Customer_Program1`
    FOREIGN KEY (`Program_id` )
    REFERENCES `bsc`.`Program` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Program_has_Customer_Customer1`
    FOREIGN KEY (`Customer_User_id` )
    REFERENCES `bsc`.`Customer` (`User_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `bsc`.`User`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `bsc`;
INSERT INTO `bsc`.`User` (`username`, `password`, `salt`) VALUES ('admin', '2e5c7db760a33498023813489cfadc0b', '28b206548469ce62182048fd9cf91760');
INSERT INTO `bsc`.`User` (`username`, `password`, `salt`) VALUES ('user1', '2e5c7db760a33498023813489cfadc0b', '28b206548469ce62182048fd9cf91760');
INSERT INTO `bsc`.`User` (`username`, `password`, `salt`) VALUES ('user2', '2e5c7db760a33498023813489cfadc0b', '28b206548469ce62182048fd9cf91760');
INSERT INTO `bsc`.`User` (`username`, `password`, `salt`) VALUES ('user3', '2e5c7db760a33498023813489cfadc0b', '28b206548469ce62182048fd9cf91760');
INSERT INTO `bsc`.`User` (`username`, `password`, `salt`) VALUES ('tutor1', '2e5c7db760a33498023813489cfadc0b', '28b206548469ce62182048fd9cf91760');
INSERT INTO `bsc`.`User` (`username`, `password`, `salt`) VALUES ('tutor2', '2e5c7db760a33498023813489cfadc0b', '28b206548469ce62182048fd9cf91760');
INSERT INTO `bsc`.`User` (`username`, `password`, `salt`) VALUES ('tutor3', '2e5c7db760a33498023813489cfadc0b', '28b206548469ce62182048fd9cf91760');

COMMIT;

-- -----------------------------------------------------
-- Data for table `bsc`.`orangtua`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `bsc`;
INSERT INTO `bsc`.`orangtua` (`nama_ayah`, `tempat_lahir_ayah`, `tanggal_lahir_ayah`, `pekerjaan_ayah`, `no_telp_ayah`, `email_ayah`, `facebook_ayah`, `nama_ibu`, `tempat_lahir_ibu`, `tanggal_lahir_ibu`, `alamat_ayah`, `alamat_ibu`, `pekerjaan_ibu`, `no_telp_ibu`, `email_ibu`, `facebook_ibu`) VALUES ('bapak ahmad', 'jakarta', '2010-12-22', 'petani', '091232838', 'ayah@email.com', 'fbAyahahmad', 'rohayati', 'padang', '2010-12-22', 'jalan sekudung', 'jalan semaru', 'dokter', '0918272', 'ibuahmad@gmail.com', 'ibunyaAhmad');
INSERT INTO `bsc`.`orangtua` (`nama_ayah`, `tempat_lahir_ayah`, `tanggal_lahir_ayah`, `pekerjaan_ayah`, `no_telp_ayah`, `email_ayah`, `facebook_ayah`, `nama_ibu`, `tempat_lahir_ibu`, `tanggal_lahir_ibu`, `alamat_ayah`, `alamat_ibu`, `pekerjaan_ibu`, `no_telp_ibu`, `email_ibu`, `facebook_ibu`) VALUES ('bapak junaedi', 'depok', '1960-1-21', 'lawyer', '091123476', 'junaedi@email.com', 'fbjunaedi', 'maimunah', 'jawa tengah', '1970-10-30', 'jalan mawar', 'jalan mawar', 'ibu rumah tangga', '0916754', 'ibujun@gmail.com', 'bumun');
INSERT INTO `bsc`.`orangtua` (`nama_ayah`, `tempat_lahir_ayah`, `tanggal_lahir_ayah`, `pekerjaan_ayah`, `no_telp_ayah`, `email_ayah`, `facebook_ayah`, `nama_ibu`, `tempat_lahir_ibu`, `tanggal_lahir_ibu`, `alamat_ayah`, `alamat_ibu`, `pekerjaan_ibu`, `no_telp_ibu`, `email_ibu`, `facebook_ibu`) VALUES ('bapak rahmat', 'jagakarsa', '1977-2-4', 'pns', '091098798', 'rahmat@email.com', 'fbrahmat', 'zubaidah', 'jawa timur', '1970-08-6', 'jalan melati', 'jalan melati', 'pns', '091984567', 'iburahmat@gmail.com', 'ibuzuzu');

COMMIT;

-- -----------------------------------------------------
-- Data for table `bsc`.`Customer`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `bsc`;
INSERT INTO `bsc`.`Customer` (`User_id`, `nama`, `tanggal_lahir`, `tempat_lahir`, `alamat_rumah`, `asal_sekolah`, `alamat_sekolah`, `kelas_jurusan`, `no_hp`, `email`, `facebook`, `anak_ke`, `jumlah_saudara`, `cita_cita`, `hobi`, `moto`, `mapel_disukai`, `mapel_tidak_disukai`, `orangtua_id`, `status`) VALUES ('2', 'ahmad', '1987-12-22', 'jakarta', 'jakarta', 'sma 21', 'jalan pramuka', '12', '081276', 'adada@gmail.com', 'ahmad.dani', '3', '4', 'pilot', 'basket', 'jadilah yang terbaik', 'matematika', 'bahasa indonesia', 1, 1);
INSERT INTO `bsc`.`Customer` (`User_id`, `nama`, `tanggal_lahir`, `tempat_lahir`, `alamat_rumah`, `asal_sekolah`, `alamat_sekolah`, `kelas_jurusan`, `no_hp`, `email`, `facebook`, `anak_ke`, `jumlah_saudara`, `cita_cita`, `hobi`, `moto`, `mapel_disukai`, `mapel_tidak_disukai`, `orangtua_id`, `status`) VALUES ('3', 'santi', '1999-11-10', 'jakarta', 'jakarta', 'sma mandiri', 'jalan sudirman', '10', '081274', 'ededed@gmail.com', 'santi.sansan', '1', '2', 'dokter', 'membaca', 'jadilah yang terbaik', 'bahasa inggris', 'bahasa indonesia', 2, 2);
INSERT INTO `bsc`.`Customer` (`User_id`, `nama`, `tanggal_lahir`, `tempat_lahir`, `alamat_rumah`, `asal_sekolah`, `alamat_sekolah`, `kelas_jurusan`, `no_hp`, `email`, `facebook`, `anak_ke`, `jumlah_saudara`, `cita_cita`, `hobi`, `moto`, `mapel_disukai`, `mapel_tidak_disukai`, `orangtua_id`, `status`) VALUES ('4', 'doni', '1989-6-21', 'jakarta', 'jakarta', 'sma berdikari', 'jalan mt haryono', '8', '081275', 'ododod@gmail.com', 'doni.nido', '2', '3', 'presiden', 'menulis', 'jadilah yang terbaik', 'fisika', 'bahasa indonesia', 3, 2);

COMMIT;

-- -----------------------------------------------------
-- Data for table `bsc`.`Role`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `bsc`;
INSERT INTO `bsc`.`Role` (`role`) VALUES ('admin');
INSERT INTO `bsc`.`Role` (`role`) VALUES ('siswa');
INSERT INTO `bsc`.`Role` (`role`) VALUES ('pengajar');

COMMIT;

-- -----------------------------------------------------
-- Data for table `bsc`.`User_has_Role`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `bsc`;
INSERT INTO `bsc`.`User_has_Role` (`User_id`, `Role_id`) VALUES (1, 1);
INSERT INTO `bsc`.`User_has_Role` (`User_id`, `Role_id`) VALUES (2, 2);
INSERT INTO `bsc`.`User_has_Role` (`User_id`, `Role_id`) VALUES (3, 2);
INSERT INTO `bsc`.`User_has_Role` (`User_id`, `Role_id`) VALUES (4, 2);
INSERT INTO `bsc`.`User_has_Role` (`User_id`, `Role_id`) VALUES (5, 3);
INSERT INTO `bsc`.`User_has_Role` (`User_id`, `Role_id`) VALUES (6, 3);
INSERT INTO `bsc`.`User_has_Role` (`User_id`, `Role_id`) VALUES (7, 3);

COMMIT;

-- -----------------------------------------------------
-- Data for table `bsc`.`Pengajar`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `bsc`;
INSERT INTO `bsc`.`Pengajar` (`User_id`, `nama_lengkap`, `nama_panggilan`, `alamat_rumah`, `alamat_kost`, `no_hp`, `no_rekening`, `fakultas`, `jurusan`, `status`, `angkatan`, `ipk`, `tempat_lahir`, `tanggal_lahir`, `kemampuan_bahasa`, `hobby`, `cita_cita`, `karakter`, `kendaraan`) VALUES (5, 'heri heriyanto', 'heriyanto', 'jawa tengah', 'depok', '08198876', '1827262', 'mipa', 'fisika', 2, '2008', '3.5', 'jawa tengah', '1990-10-12', 'bahasa inggris', 'mancing', 'peneliti', 'baik', 'motor');
INSERT INTO `bsc`.`Pengajar` (`User_id`, `nama_lengkap`, `nama_panggilan`, `alamat_rumah`, `alamat_kost`, `no_hp`, `no_rekening`, `fakultas`, `jurusan`, `status`, `angkatan`, `ipk`, `tempat_lahir`, `tanggal_lahir`, `kemampuan_bahasa`, `hobby`, `cita_cita`, `karakter`, `kendaraan`) VALUES (6, 'salsa dona', 'salsa', 'jawa barat', 'depok', '08198855', '1827212', 'mipa', 'matematika', 1, '2007', '3.6', 'jawa barat', '1989-6-2', 'bahasa inggris', 'menulis', 'dosen', 'baik', 'motor');
INSERT INTO `bsc`.`Pengajar` (`User_id`, `nama_lengkap`, `nama_panggilan`, `alamat_rumah`, `alamat_kost`, `no_hp`, `no_rekening`, `fakultas`, `jurusan`, `status`, `angkatan`, `ipk`, `tempat_lahir`, `tanggal_lahir`, `kemampuan_bahasa`, `hobby`, `cita_cita`, `karakter`, `kendaraan`) VALUES (7, 'mira rumira', 'mira', 'jawa timur', 'depok', '08198834', '1827257', 'mipa', 'kimia', 1, '2007', '3.7', 'jawa timur', '1989-2-12', 'bahasa inggris', 'membaca', 'pengusaha', 'baik', 'motor');

COMMIT;

-- -----------------------------------------------------
-- Data for table `bsc`.`Program`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `bsc`;
insert into program (`nama_program`, `deskripsi_program`) values ('SD 1-5','Program untuk kelas SD 1 sampai 5');
insert into program (`nama_program`,`deskripsi_program`) values ('SD 6','Program untuk SD kelas 6 dan kelulusan SD');
insert into program (`nama_program`,`deskripsi_program`) values ('SMP 7-8','');
insert into program (`nama_program`,`deskripsi_program`) values ('SMP 9','');
insert into program (`nama_program`,`deskripsi_program`) values ('SMA 10-11','');
insert into program (`nama_program`,`deskripsi_program`) values ('SMA 12','');
insert into program (`nama_program`,`deskripsi_program`) values ('Program Lulus Ujian Nasional (IPA/S)','');
insert into program (`nama_program`,`deskripsi_program`) values ('Program Lulus PTN (IPA/S/C)','');

COMMIT;
-- -----------------------------------------------------
-- Data for table `bsc`.`pelajaran`
-- -----------------------------------------------------

SET AUTOCOMMIT=0;
USE `bsc`;
insert into pelajaran (`nama_pelajaran`) values ('Matematika');
insert into pelajaran (`nama_pelajaran`) values ('Fisika');
insert into pelajaran (`nama_pelajaran`) values ('Biologi');
insert into pelajaran (`nama_pelajaran`) values ('Kimia');
insert into pelajaran (`nama_pelajaran`) values ('Geografi');
insert into pelajaran (`nama_pelajaran`) values ('Sosiologi');
insert into pelajaran (`nama_pelajaran`) values ('Ekonomi/Akuntansi');
insert into pelajaran (`nama_pelajaran`) values ('Sejarah');
insert into pelajaran (`nama_pelajaran`) values ('Bahasa Inggris');
insert into pelajaran (`nama_pelajaran`) values ('Bahasa Indonesia');

COMMIT;

-- -----------------------------------------------------
-- Data for table `bsc`.`jadwal_belajar _mengajar`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `bsc`;
insert into `bsc`.`jadwal_belajar_mengajar` (`hari`,`jam_mulai`,`jam_selesai`,`Pengajar_User_id`,`pelajaran`,`Customer_User_id`) values ('senin','08:00','09:30',5,'Matematika',2);
insert into `bsc`.`jadwal_belajar_mengajar` (`hari`,`jam_mulai`,`jam_selesai`,`Pengajar_User_id`,`pelajaran`,`Customer_User_id`) values ('selasa','19:00','20:30',5,'Fisika',2);
insert into `bsc`.`jadwal_belajar_mengajar` (`hari`,`jam_mulai`,`jam_selesai`,`pelajaran`,`Customer_User_id`) values ('rabu','13:00','14:00','Kimia',2);

COMMIT;

-- -----------------------------------------------------
-- Data for table `bsc`.`images`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `bsc`;
insert into image (`image`,`User_ID`) values ('Admin-icon.png','1');

COMMIT;

-- -----------------------------------------------------
-- Data for table `bsc`.`Jadwal_Belajar`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `bsc`;
insert into `bsc`.`Jadwal_Belajar` (`hari`,`jam_mulai`,`jam_selesai`,`pelajaran`,`Customer_User_id`) values ('Senin','13:00','15:00','Matematika',2);

COMMIT;

-- -----------------------------------------------------
-- Data for table `bsc`.`Pengajar_has_Pelajaran`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `bsc`;
insert into `bsc`.`Pengajar_has_Pelajaran` (`Pelajaran_id`,`Pengajar_User_id`) values (4,6);
insert into `bsc`.`Pengajar_has_Pelajaran` (`Pelajaran_id`,`Pengajar_User_id`) values (4,7);
insert into `bsc`.`Pengajar_has_Pelajaran` (`Pelajaran_id`,`Pengajar_User_id`) values (2,6);
insert into `bsc`.`Pengajar_has_Pelajaran` (`Pelajaran_id`,`Pengajar_User_id`) values (1,7);
insert into `bsc`.`Pengajar_has_Pelajaran` (`Pelajaran_id`,`Pengajar_User_id`) values (1,5);
insert into `bsc`.`Pengajar_has_Pelajaran` (`Pelajaran_id`,`Pengajar_User_id`) values (2,5);

COMMIT;

-- -----------------------------------------------------
-- Data for table `bsc`.`Tagihan`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `bsc`;
insert into `bsc`.`Tagihan` (`bulan`,`tahun`,`status_pembayaran`,`persetujuan`,`Customer_User_id`) values ('02','2010',1,1,2);
insert into `bsc`.`Tagihan` (`bulan`,`tahun`,`status_pembayaran`,`persetujuan`,`Customer_User_id`) values ('11','2010',0,0,2);
insert into `bsc`.`Tagihan` (`bulan`,`tahun`,`status_pembayaran`,`persetujuan`,`Customer_User_id`) values ('12','2010',0,1,2);

COMMIT;

-- -----------------------------------------------------
-- Data for table `bsc`.`Baris_Tagihan`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `bsc`;
insert into `bsc`.`Baris_Tagihan` (`details`,`biaya`,`date`,`Tagihan_id`,`status`) values ('pembayaran les',100000,'2010-02-03',1,1);
insert into `bsc`.`Baris_Tagihan` (`details`,`biaya`,`date`,`Tagihan_id`,`status`) values ('pembayaran les',100000,'2010-02-11',1,1);
insert into `bsc`.`Baris_Tagihan` (`details`,`biaya`,`date`,`Tagihan_id`,`status`) values ('pembayaran les',100000,'2010-02-20',1,1);

insert into `bsc`.`Baris_Tagihan` (`details`,`biaya`,`date`,`Tagihan_id`,`status`) values ('pembayaran les',90000,'2010-11-13',2,0);
insert into `bsc`.`Baris_Tagihan` (`details`,`biaya`,`date`,`Tagihan_id`,`status`) values ('pembayaran les',90000,'2010-11-22',2,1);
insert into `bsc`.`Baris_Tagihan` (`details`,`biaya`,`date`,`Tagihan_id`,`status`) values ('pembayaran les',90000,'2010-11-30',2,0);

insert into `bsc`.`Baris_Tagihan` (`details`,`biaya`,`date`,`Tagihan_id`,`status`) values ('pembayaran les',95000,'2010-12-02',3,1);
insert into `bsc`.`Baris_Tagihan` (`details`,`biaya`,`date`,`Tagihan_id`,`status`) values ('pembayaran les',95000,'2010-12-02',3,1);
insert into `bsc`.`Baris_Tagihan` (`details`,`biaya`,`date`,`Tagihan_id`,`status`) values ('pembayaran les',95000,'2010-12-02',3,1);

COMMIT;


/**
 * Database schema required by CDbAuthManager.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @link http://www.yiiframework.com/
 * @copyright Copyright &copy; 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 * @since 1.0
 */
 
drop table if exists AuthAssignment;
drop table if exists AuthItemChild;
drop table if exists AuthItem;

create table AuthItem
(
   name                 varchar(64) not null,
   type                 integer not null,
   description          text,
   bizrule              text,
   data                 text,
   primary key (name)
);

create table AuthItemChild
(
   parent               varchar(64) not null,
   child                varchar(64) not null,
   primary key (parent,child),
   foreign key (parent) references AuthItem (name) on delete cascade on update cascade,
   foreign key (child) references AuthItem (name) on delete cascade on update cascade
);

create table AuthAssignment
(
   itemname             varchar(64) not null,
   userid               varchar(64) not null,
   bizrule              text,
   data                 text,
   primary key (itemname,userid),
   foreign key (itemname) references AuthItem (name) on delete cascade on update cascade
);
