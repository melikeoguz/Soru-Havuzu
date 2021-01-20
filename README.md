 <h3><code><b>Melike Oğuz -170201028</b></code></h3>
 <img width="400" height="400" src="https://i.imgyukle.com/2021/01/17/HEZSfj.png" alt="foo" />

<p style="text-align:justify"><b>Soru Havuzu</b> uygulaması sınava hazırlanan öğrencilere yönelik bir uygulamadır. Öğrenciler, bu uygulama sayesinde kendilerini test edebilir ve yanlış çözdüğü soruları görebilmektedir. Çözülen sorular sonucunda öğrenciler belli bir puan kazanmaktadır. Bu uygulamadaki amaç, öğrencilerin hazırladığı sınava karşı pratik yapmalarıdır. </p>
<p style="text-align:justify">Proje içinde yer alan sınav türleri şunlardır:</p>
<p>👉 YKS (AYT /TYT)<br/>
 👉 LGS <br/>
  👉 KPSS <br/>
   👉 ALES <br/>
</p>

<p></p>
<h3 style="text-align:center">Kurulum İşlemleri</h3>

Bu projemizin altyapısında Ionic, Angular, Typescript kullanılmaktadır. Projenin temel yapısını oluşturmak için gerekli aşamalar aşağıdaki gibidir:

<ul>

<li>NodeJs indirme</li>
<li>Angular Kurulumuve Proje Oluşturma</li>
<li>Ionic Kurulumu ve Proje Oluşturma</li>
<li>Database Bağlantıları</li>
</ul>

<h3><code>1- NodeJs İndirme</code></h3>
Bu projeyi gerçekleştirebilmeniz için öncelikle NodeJs'i indirmeniz gerekmektedir. Çünkü projemizin alt yapısında angular, ionic ve typescript kullanılıyor. Bu sistemlerin çalışabilmesi için <a href="https://nodejs.org/tr/download/">buraya tıklayarak</a> NodeJs'i bilgisayarınıza indirin.
<br></br>
<p>Kullandığınız sisteme bağlı olarak linux ya da windows için gerekli projeleri indirin. Bu işlem tamamlandıktan sonra aşağıda yapmanız gereken adımlar şunlardır:
</p>

<ul>
<li>Terminal ekranından gereken komutları yazabilmeniz için <b>ortam değişkenlerine</b> kullanacağınız sistemin pathini yazmalısınız. </li>
<li>Bunun için indirdiğiniz NodeJs klasörünün içinde bulunan <b>node_modules</b> klasörünün içindeki <b>npm</b> dosyasının pathini eklemelisiniz.</li>
<li>Böylelikle ionic, angular ya da gerekli komutları sorunsuz çalıştıracaktır.</li>
<li>npm install yazarak gerekli kurulumların yapılmasını sağlayın.</li>

</ul>
<code>Bu projede kullanılan path aşağıdaki gibidir.</code>

		D:\node-v14.15.4-win-x64\node-v14.15.4-win-x64\node_modules\npm;


<h3><code>2- Angular Kurulumu</code></h3>

Projemizi oluşturmak için öncelikle derslerde de kullandığımız gibi genel bir dosya (lecture-mobil-gece) oluşturalım. 

<p style="text-align:justify">Daha sonra cmd ile lecture-mobil-gece dizinine geldikten sonra <code><b>npm install -g @angular/cli</b></code> metodunu çalıştıralım. Artık bir angular projesi oluşturabilmek için gerekli modüller sisteminize yüklenmiştir.</p>
<p style="text-align:justify"> Bu adımdan sonra yapılması gereken tek işlem angular projesi oluşturmaktır. Hemen <code><b>ng new angular-kickstart </b></code> yazıp projemizi oluşturalım. </p> 

	Soru Havuzu uygulamasında ionic projesi kullanıldığı için bundan sonra
    yapılması gereken işlemleri yapmanıza gerek yoktur.

<h3><code>3- Ionic Kurulumu</code></h3>

<p style="text-align:justify">Projemiz Ionic'in son sürümü ile yazılmıştır. Bu yüzden gerekli ionic altyapılarının yüklenmesi gerekmektedir. Bunun için <code><b>npm install -g @ionic/cli</b></code> kodunu çalıştırıp daha sonra bir adet ionic projesi oluşturmalısınız.</p>

<p style="text-align:justify">Yeni bir proje oluşturmak için <code><b>ionic start</b></code> yazıp kendi projenizin adını yazmalısınız. Bu proje için <code><b>ionic start ionic-try blank</b></code> yazılmıştır. Blank yerine sidemenu diyerek de proje oluşturabilirsiniz.</p>


<h3><code>4- Database Bağlantıları</code></h3>

<p  style="text-align:justify"> Projeyi oluştururken sqllite kullanarak yapmaya çalıştım ama karşılaştığım hatalardan ötürü projemde ilerleyemedim. Bu sebeplerden ötürü başka bir çözüm yöntemi olarak mySql ile database bağlantılarını gerçekleştirdim. </p>
<p>Database işlemlerini gerçekleştirimek için depolama yapacağımız için <b>storage service</b> yapısını kullandım. Bunun çalışması için öncelikle projenize storage için kullanılacak olan ayarlanmaların yapılması gerekmektedir. <code><b>npm install @ionic/storage --save</b></code> kodunu terminalden çalıştırmalısınız. Ayrıca typescript ile yazılmış (.ts uzantılı) modül sayfanıza sayfanızın başına <code><b>import { Storage } from '@ionic/storage';</b></code> ekleyip, constructor kısmına <code><b>private storage: Storage</b></code> daha sonra  Bu işlem tamamlandıktan sonra kayıt olma, uygulamaya giriş yapma işlemlerine başlayabiliriz.</p>

<p style="text-align:justify">Database işlemleri için xampp control panelini kullanarak mysql ve apache servislerini başlattım. Daha sonra veritabanı ile bağlantının sağlanması için config.php ile veritabanına bağlanmak için gerekli hostname, host gibi bilgilerin içinde bulunduğu sistem oluşturdum.</p>

<p>Ionic tarafında bir modül ekleyebilmek için <code><b>ng generate page ....(component_adi)</b></code> yazarsanız istediğiniz modül projenize eklenecektir. Ben bunun için bir pages componenti oluşturdum. Daha sonra bunun içine;</p>

<ul>
    <li>login</li>
    <li>home </li>
    <li>registration</li>
    <li>crud</li>
</ul>
adında modüller ekledim. 
<hr></hr>
<p>Bu modüllerin içinde giriş ekranı kodları ve kayıt olma işlemi ekranının ionic yapısı ve css kodları bulunmaktadır. Bu kodlar dışında bir yere tıkladığında uygulamanın başka sayfa gitmesi için </p>

storage indirme

npm install --save @ionic/storage -> storage indirme
import { Storage } from '@ionic/storage';


npm instal -g ionic
npm install -g @angular/cli
<hr></hr>

<h4>Karşılaştığım Sorunlar</h4>

ionic bach problemi
</br>


![](https://hayalindekiyasam.files.wordpress.com/2021/01/login-kullanici-ekleme-ve-guncelleme.gif)
