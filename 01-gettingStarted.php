<!-- WordPress sistem dosyalari su dizinde bulunur; C:\Users\esads\Local Sites\deneme\app\public
yazacagimiz php dosyalarini bu dizine kaydedecegiz.
Bunlardan en önemlisi wp-content isimli klasördür. themes klasörü de bunun icindedir. -->

// 
// 
// 
//
//
// 1. Creating a New Theme //

WP-Admin konsolunda, solda Appearance sekmesinde Themes, ardindan Add New butonuna tikliyoruz. Burada kullanabilecegimiz hazir temalari görecegiz.
Kendi temamizi olusturmak icin ise C:\Users\esads\Local Sites\deneme\app\public\wp-content\themes dizininde yeni bir klasör acariz, klasörü istedigimiz gibi adlandiririz.
Sonra bu klasörü vscode'da acariz. Yeni bir style.css ve index.php dosyasi olustururuz.

<!-- Burasi style.css bölgesi. -->

<!-- Dosya ismi style.css olmak zorunda, cünkü WordPress bu ismi arar. -->
/*
Theme Name: Universität Siegen
Author: Enes
Version: 1.0
*/
<!-- Olusturacagimiz temanin ismini yazarini vs bu sekilde seceriz. Burasi siradan bir yorum satiri degil.
Olusturulan temanin index.php, styles.css, ve screenshot.png(tema önizlemesi) dosyalari
C:\Users\esads\Local Sites\deneme\app\public\wp-content\themes\proje adi altina yapistirilir.

<!-- Burasi style.css bölgesi. -->

// 
// 
// 
//
//
// 2. Coding PHP //

<!-- Burasi index.php bölgesi. -->

<?php
// Burasi artik php bölgesi.

echo 2+2;
// echo js'deki return gibi bir seydir. 

// php'de fonksiyona verilecek parametreler ve kullanilacagi yerlerde basina $ simgesi getirilir.
function selamlama ($isim) {
    echo "<h1> Merhaba $isim, bu benim ilk php deneyimim. </h1>"
    // echo, yazili satiri oldugu gibi HTML'e basar.
}

bloginfo('name'); // Sitenin Title'ini döndürür.
bloginfo('description'); // Sitenin Tagline'ini döndürür.
// Konsol - Settings - General sayfasindaki bilgileri döndürür.

?>

<?php
$benimAdim = "Enes"; // php'de degisken tanimlama
$isimler = array("Enes", "Hilal", "Gürcan"); // php'de array tanimlama

$say = 0;
while ($say < count($isimler)) { echo "<li>$say</li>"; $say++;} // php'de while döngüsü tanimlama
// count($isimler), isimler arrayinin uzunlugunu döndürür.
?>

<h1> Merhaba <?php echo $isim ?> , listedeki ilk isim <?php echo $isimler[0] ?> seklinde. </h1>
<!-- Bir php degiskeni, php alani disinda yalnizca php alani tanimlanarak döndürülebilir. -->

// 
// 
// 
//
//
// 3. WordPress Specific PHP //

Konsolun Posts sekmesinde bizim editör ile hazirlayacagimiz gönderilerimiz bulunur. (ardindan web sayfamiza bastirmak isteyecegimiz gönderiler.)
Tabi bunlar birden fazla sayida olacagi icin tek tek bastirmak yerine döngüler ile bastirmak daha mantiklidir.

<!-- Burasi index.php bölgesi. -->
<?php
while(have_posts()){
    // have_posts(), "döngüye girecek gönderilerimiz oldugu sürece bu satirlari calistir." demek.
    // yani sahip oldugumuz gönderi sayisinca bu döngü calisir.
the_post(); ?>
<!-- the_post(), döngünün icindeki post indexlerini iterate eder. Yani normal while döngülerinde parametreyi bir arttiriyorken, bu isi burada the_post yapar. -->
<h1> <a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a> </h1>"
<!-- the_permalink(), postun linkini döndürür. title'a tikladigimizda ise .../yil/ay/gün/title-adi seklinde bizi kendisinin olusturdugu yeni bir rotaya götürür. -->
<!-- the_title(), postun title'ini döndürür. -->
<!-- the_content(), postun content'ini döndürür. -->
<?php the_content(); ?>
?>
<?php
//
?>
Bu sayfayi oldugu gibi single.php adinda olusturacagimiz dosyaya kopyalar, ardindan title kismindan a etiketini sileriz.
Cünkü öbür türlü, title linklerine girdigimizde, linkler hala calisir durumda kaliyorlar. Zaten icinde oldugumuz bi sayfaya girmek istemek sacma olacagi icin bu sekilde yapariz.
Linke tiklandiginda, Wordpress kendisi single.php adinda bir dosya arar ve onu cagirir.  
<!-- Burasi index.php bölgesi. -->
<!-- 
--
--
--
 -->
<!-- Burasi single.php bölgesi. -->
<?php
while(have_posts()){
    // have_posts(), "döngüye girecek gönderilerimiz oldugu sürece bu satirlari calistir." demek.
    // yani sahip oldugumuz gönderi sayisinca bu döngü calisir.
the_post(); ?>
<!-- the_post(), döngünün icindeki post indexlerini iterate eder. Yani normal while döngülerinde parametreyi bir arttiriyorken, bu isi burada the_post yapar. -->
<h1> <?php the_title(); ?> </h1>"
<!-- the_permalink(), postun linkini döndürür. title'a tikladigimizda ise .../yil/ay/gün/title-adi seklinde bizi kendisinin olusturdugu yeni bir rotaya götürür. -->
<!-- the_title(), postun title'ini döndürür. -->
<!-- the_content(), postun content'ini döndürür. -->
<?php the_content(); ?>
?>
<?php
?>
<!-- Burasi single.php bölgesi. -->

Postlar disinda bir de page'ler vardir. Tüm bu link meseleleri page dedigimiz seyler icin de gecerlidir.
Herhangi bir page'e baglandigimizda o page'in title'inin hala kendi link etiketini barindirmasini istemeyiz. 
<!-- Burasi page.php bölgesi. -->
<?php
while(have_posts()){
the_post(); ?>
<h1> Bu bir page, post degil. </h1>
<h1> <?php the_title(); ?> </h1>
<?php the_content(); ?>
<?php }
?>
<!-- Burasi page.php bölgesi. -->

// 
// 
// 
//
//
// 4. Header & Footer in PHP //

header.php ve footer.php adinda iki dosya olusturulur ve bu dosyalar tasarlanir.
Daha sonra bunlar sitenin her bir sayfasinda (page, single vs.) (sayfanin basinda ve sonunda) <?php get_header(); ?> ve <?php get_footer(); ?> metodlariyla cagirilir.

<!-- Burasi header.php bölgesi. -->
<!-- Acilis header'da, kapanis footer'da yapilir. -->
<!DOCTYPE html>
<html>
    <head>
    <?php wp_head(); ?>
    <!-- Bu satir WordPress'in head kismini kontrol etmesini, ve ne yüklemesi gerekiyorsa onu yüklememizi saglar. CSS dosyalari WordPress'te böyle yüklenir.
bu fonksiyona CSS'i yüklemesini isaret etmek icin de functions.php adinda bir dosya olusturulur. -->
    </head>
    <body>
    <h1>HEADER</h1>
    
<!-- Burasi header.php bölgesi. -->
<!-- -->
<!-- -->
<!-- -->
<!-- Burasi footer.php bölgesi. -->
<   h1>FOOTER</h1>
    <?php wp_footer(); ?>
    <!-- Bu satir WordPress'in footer kismini kontrol etmesini, ve ne yüklemesi gerekiyorsa onu yüklememizi saglar.
    JS dosyalari WordPress'te böyle yüklenir. -->
    </body>
</html>
<!-- Burasi footer.php bölgesi. -->

<!-- Burasi function.php bölgesi. -->
<?php 

function cagirilacakfonksiyon() {
    wp_enqueue_style('sayfastilleri', get_stylesheet_uri())
    // Bu fonksiyon iki parametre alir. Birincisi yüklemek istedigimiz css dosyasi icin rastgele bir takma ad.
    // Ikinci parametre ise bir style.css dosyasi arar ve onu döndürür.
    wp_enqueue_style('dizindekiayfastilleri', get_theme_file_uri('dosyalar/stiller.css'))
    // Ya da belirli bir dizinden ya da adresten belirli isimde bir css dosyasi cekmek isteniyorsa da bu sekilde yapilir.
    // get_theme_file_uri HTML bölgesinde img dosyasi cekmek icin de kullanilir;
    url(<?php echo get_theme_file_uri('/images/library-hero-jpg') ?>);
    wp_enqueue_style('ikonsitesi', '//ikonsitesi.com/linkindevami'))
    // Birden fazla css dosyasi eklenmek istendiginde bu satir cogaltilabilir.
    // Yüklenmek istenen js dosyasi ise, wp_enqueue_script() olarak degistirilir.
    wp_enqueue_script('jsdosyasi', get_theme_file_uri('dosyalar/jsdosyasi.js'), array('jquery') ya da NULL, 1.0, true);
    //  gwp_enqueue_script burada 3 parametre daha alir: yükleyecegimiz js dosyasi jquery'e bagli ise o, scriptin sürüm numarasi, sonuna da body taginin kapanisindan
    // hemen önce mi yüklemek istiyorsunuz? true ya da false. 
}

add_action('wp_enqueue_scripts', 'cagirilacakfonksiyon' ); ?>
Bu fonksiyon WordPress'e talimatlar vermemize ve ne yapmasi gerektigini söylememizi saglar.
Ilk parametre talimatin türünü alir. Buradaki wp_enqueue_scripts Wordpress'e CSS JS gibi dosya yükleme islemlerinde kullanilir.
ikinci parametreye ise calistirilmak istenen fonksiyon yazilir.
<!-- Burasi function.php bölgesi. -->
