<h3><b>Mobil Programlama Projesi</b></h3>

<hr> <h><b>Melike Oğuz -170201028 </b></h></hr>

 <img width="400" height="400" src="https://github.com/melikeoguz/Melike-Oguz-Soru-Havuzu/blob/main/HEZSfj.png" alt="foo" />


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
<li>Typescript Kurulumu</li>
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

 <img src="https://hayalindekiyasam.files.wordpress.com/2021/01/ionic-serve-sorunu-cozumu.jpg" alt="ionic serve sorunu çözümü" />

<h3><code>4- Typescript Kurulumu</code></h3>
<p  style="text-align:justify">Ionic tabanlı bir proje geliştiriyorsanız eğer dil olarak typescript formatında projenizi geliştirmeniz gerekmektedir. Typescript kurulumu için <code><b>npm install -g typescript</b></code> komutunu yazmanız yeterlidir.</p>

<p  style="text-align:justify">Aşağıdaki görsele bakarak kurulumları görebilirsiniz. 👇</p>
<img src="https://hayalindekiyasam.files.wordpress.com/2021/01/typescript-kurulumu.jpg" alt="typescript kurulumu" />


<h3><code>5- Database Bağlantıları</code></h3>

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
adında modüller ekledim.Aşağıdaki görsele bakarak <b>page oluşturma işlemini görebilirsiniz.</b>
<img src="https://hayalindekiyasam.files.wordpress.com/2021/01/page.jpg" alt="create page" />

<hr></hr>
<p>Bu modüllerin içinde giriş ekranı kodları ve kayıt olma işlemi ekranının ionic yapısı ve css kodları bulunmaktadır. Bu kodlar dışında bir yere tıkladığında uygulamanın başka sayfa gitmesi için <b>navigate</b> kullanılmaktadır. <code><b>this.router.navigate(['/anasayfa']);</b></code> komutu ile yönlendirmelerinizi yapabilirsiniz. </p>

<p>Kısacası iki dil arasında bağlantının sağlanması için bir api yazdım ve böylelikle iki servis birbiri arasında iletişim sağlayabildi. Yapılan tüm işlemlerin sonucunu aşağıdaki gifi izleyerek görebilirsiniz.</p>

![Login İşlemleri](https://hayalindekiyasam.files.wordpress.com/2021/01/login-kullanici-ekleme-ve-guncelleme.gif)

<p>Login işlemlerinin kontrollü bir şekilde gerçekleştirilip gerçekleştirilmediğini anlamak için sonucu döndüren bir liste için sayfa oluşturup içerisine <b>düzenleme</b> ve <b>silme</b> yetkileri verdim.</p>


<h3><code>6- Kullanılan Özellikler</code></h3>

<p>Uygulamamızın için form modülü de eklenmesi gerektiğinden ötürü <b>heroes</b> modülünün içine kullanıların, uygulama hakkında görüşlerini bildirecekleri kısım ekledim. Bu işlemi;</p>

        import { NgModule } from '@angular/core';
        import { CommonModule } from '@angular/common';
        import { FormsModule } from '@angular/forms';

        import { IonicModule } from '@ionic/angular';

        import { HeroesPageRoutingModule } from './heroes-routing.module';

        import { HeroesPage } from './heroes.page';

        @NgModule({
          imports: [
            CommonModule,
            FormsModule,
            IonicModule,
            HeroesPageRoutingModule
          ],
          declarations: [HeroesPage]
        })
        export class HeroesPageModule {}




<hr></hr>


    <ion-header>
      <ion-toolbar>
        <ion-title>heroes</ion-title>
      </ion-toolbar>
    </ion-header>

    <ion-content>

    <h2><code>Sayfa Yöneticisi: {{hero.name | uppercase}}</code></h2>
    <div>

    <label>Uygulamamız Hakkında Düşünceleriniz:
      <input [(ngModul)]="hero.name" placeholder="Mesajınızı Yazınız.."/>
    </label>
    </div>
    <br/>

    </ion-content>
yazarak gerçekleştirdim. 

<p>Pipe kullanımı için ise <code>{{hero.name | uppercase}}</code> gibi sınav türlerine özel sayfalar açıldığında başlıkların hepsi bu formatta ekrana basılmaktadır. </p>

<ul>Projemde kullanılan UI Componentleri;

<li>Alert Button</li>
<li>Action Sheet</li>
<li>Date & Time Pickers</li>
<li>List</li>
<li>Input</li>
<li>Progress Indicators</li>
<li>Routing</li>
<li>Select</li>
<li>Toast Segment</li>
  
</ul>

<p>Ayrıca içinde geçmiş soru çözümlerinin kayıtlarını tutup, ilgili sınavın birincisini göstermektedir. Projeyi çalıştırmak için <code><b>Ionic serve -l</b></code> yazmanız yeterlidir.</p>
  
<h3 style="text-align:center"><code>Karşılaştığım Sorunlar</code></h3>
<h5>1- Ionic Bach Sorunu</h5>
<img src="https://hayalindekiyasam.files.wordpress.com/2021/01/ionic-serve-sorunu.jpg" alt="ionic serve sorunu" />
  
  <h5>2- Ionic Bach Sorunu Çözümü</h5>
 <img src="https://hayalindekiyasam.files.wordpress.com/2021/01/ionic-serve-sorunu-cozumu.jpg" alt="ionic serve sorunu çözümü" />
 
  <h5>3- Ng Has Unexpectedly Closed</h5>
 <img src="https://hayalindekiyasam.files.wordpress.com/2021/01/mal.jpg" alt="foo" />
 
 <p>Bu sorunu çözebilmek için yeniden bir proje oluşturup eski kaynak kodlarını içerisine yükledim.</p>
 
   <h5>4- Database'i Bağlarken Karşılaşılan Sorun</h5>
 <img src="https://hayalindekiyasam.files.wordpress.com/2021/01/sorunlarr.jpg" alt="sorunlar" />
 <p><code><<b>npm i rxjs-compat</b></code> komutunu eğer çalıştırmazsanız veritabanı ile iletişim kurulamamaktadır.</p>

 <h5>5- Router Hatası</h5>
<img src="https://hayalindekiyasam.files.wordpress.com/2021/01/router-hatasi.jpg" alt="router hatası" />
 <h5>6- Router Hatası Çözümü</h5>
    
<img src="https://hayalindekiyasam.files.wordpress.com/2021/01/router-hatasicozumu.jpg" alt="router hatası çözümü" />



<h2><code>Projenin Son Hali</code></h2>

Projemi aşağıdaki gifi izleyerek görüntüleyebilirsiniz.

![](https://github.com/melikeoguz/Melike-Oguz-Soru-Havuzu/blob/main/melike-oguz-soru-havuzu.gif)


