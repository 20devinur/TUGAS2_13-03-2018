
<?php 
    $username = "u317664416_mhs";                     //username yang dipakai
    $password= "1501530042";                          //password yang dipakai
    $db = " 	u317664416_tugas";                            //database yang dipakai
    mysql_connect("host",$username,$password) or die("koneksi ke MySQL gagal");
    mysql_select_db($db) or die ("koneksi ke dataBase gagal");
   
    $doc = new DomDocument('1.0');                              //memanggil DOMDocument Class
    $root = $doc->createElement('u317664416_tugas');                      //Buat element baru <mahasiswa>
    $root = $doc->appendChild($root);                        
  
    $query=mysql_query("select nim,nama,alamat,progdi from mahasiswa");         
    while ( $get_data = mysql_fetch_object($query)) 
    {
        $item= $doc->createElement('u317664416_mhs');                 //buat element baru <item>
        $item = $root->appendChild($item);                  //masukkan sebagai anak dari element <news>
        foreach($get_data as $fieldname => $fieldvalue)  
        {  
            $child = $doc->createElement($fieldname);      //buat element baru <nama_kolom_tabel>
            $child = $item->appendChild($child);           //masukkan sebagai anak dari element <item>
         
            $value = $doc->createTextNode($fieldvalue);    //tambahkan isi data database ke element baru
            $value = $child->appendChild($value);
        }  
    }
    echo $doc->saveXML();   //sekedar menampilkan hasil penyimpanan ke XML
    $doc->save("mahasiswa.xml");   //simpan XML yang sudah dibuat ke file news.xml
?>