<?php 

$db = new Database($veritabani["host"],$veritabani["user"],$veritabani["password"]);

/**
 * Database, PDO DAN miras alınarak oluşturulmuş bir veritabanı sınıfıdır.
 */
class Database extends PDO
{
	/**
	 * [$sql işlenecek olan sql kodu]
	 * @var [sql]
	 */
	public $sql;
	/**
	 * [$veri işlenecek olan veri]
	 * @var array
	 */
	public $veri=array();

	private $adet=null;

	/**
	 * [__construct pdo üzeriden sunucu ve veritabanına bağlanma]
	 * @param [string] $sunucu    [description]
	 * @param [type] $kullanici [description]
	 * @param [null] $sifre     [description]
	 */
	function __construct($sunucu,$kullanici,$sifre)
	{
		try
		{
			parent::__construct($sunucu,$kullanici,$sifre);		
		}
		catch( PDOException $hata )
		{
			die("Bağlantı hatası..");
		}
	}
	/**
	 * [insert veritabanına kayıt ekler]
	 * @return [true/false] []
	 */
	public function insert()
	{
		$sorgu = parent::prepare( $this->sql );
		$ekle = $sorgu->execute( $this->veri );
		if ( $ekle ) { return true; }else{ return false; }
	}
	/**
	 * [select veritabanından kayıtları seçer]
	 * @param  string $param [1 ise tek kayıt boş ise çoklu kayıt listelemek için kullanılır]
	 * @return [false-record]        [description]
	 */
	public function select($param="")
	{
		if ($param=="") { // eğer $param boş ise
			$sorgu = parent::prepare( $this->sql );
			$liste = $sorgu->execute( $this->veri );
			if($sorgu->rowCount()>0){ // eğer kayıt var ise
				$this->adet = $sorgu->rowCount();
				return $sorgu->fetchAll(PDO::FETCH_OBJ); // olan tüm kayıtları döndür.
			}else{
				return false;
			}
		}else{
			$sorgu = parent::prepare( $this->sql );
			$liste = $sorgu->execute( $this->veri );
			if($sorgu->rowCount()>0){
				$this->adet = $sorgu->rowCount();
				return $sorgu->fetch(PDO::FETCH_OBJ);
			}else{
				return false;
			}			
		}
	}
	/**
	 * [update veritabanındaki kayıtları günceller]
	 * @return [true/false] []
	 */
	public function update()
	{
		$sorgu = parent::prepare( $this->sql );
		return $sorgu->execute( $this->veri );
	}
	/**
	 * [delete veritabanında kayıt siler]
	 * @return [true/false] []
	 */
	public function delete()
	{
		$sorgu = parent::prepare( $this->sql );
		return $sorgu->execute( $this->veri );
	}

	public function adet()
	{
		return $this->adet;
	}
}