import { Component, OnInit } from '@angular/core';
import { Router, ActivatedRoute } from '@angular/router';
import { ToastController, AlertController, LoadingController, NavController } from '@ionic/angular';
import { AccessProviders } from '../providers/access-providers';
import { Storage } from '@ionic/storage';
import { resolve } from 'dns';

@Component({
  selector: 'app-anasayfa',
  templateUrl: './anasayfa.page.html',
  styleUrls: ['./anasayfa.page.scss'],
})
export class AnasayfaPage implements OnInit {
  datastorage: any;
  name: string;
  user_id:number;
  sinav : string;
  sonuclar: any = [];
  kisi_adi: string;
  en_iyi_puan : number;
  constructor(
    private router: Router,
    private toastctrl: ToastController,
    private alertctrl: AlertController,
    private loadingctrl: LoadingController,
    private accessproviders: AccessProviders,
    private navctrl: NavController,
    private storage: Storage
  ) { }

  ngOnInit() {
  }

  ionViewDidEnter(){
    this.sonuclar = [];
    this.storage.get('storage_session').then((res) => {
      this.datastorage = res;
      this.name = this.datastorage.fullname;
      this.user_id = this.datastorage.user_id;
      this.sinav = this.datastorage.sinav;
      this.sonuclarList();
      this.EnIyisi();
    });
  }

  async SonucDelete(id){
    return new Promise(resolve => {
      let body = {
        action: 'delete_sonuc',
        sonuc_id: id 
      }
      this.accessproviders.postData(body, 'api.php').subscribe((res: any) => {
        if(res.success == true){
          this.presentToast("Sonuç başarıyla silindi.");
          this.ionViewDidEnter();
        } else {
          this.presentToast("Sonuç silinemedi.");
        }
      });
    });
  }

  async sonuclarList(){
    return new Promise(resolve => {
      let body = {
        action: 'sonuclar_listesi',
        user_id: this.user_id,
      }
      this.accessproviders.postData(body, 'api.php').subscribe((res: any) => {
        //console.log(res);
        for(let data of res.result) {
          this.sonuclar.push(data);
        }
        resolve(true);
      });
    });
  }

  async EnIyisi(){
    return new Promise(resolve => {
      let body = {
        action: 'en_iyi_kisi',
        sinav : this.sinav
      }
      this.accessproviders.postData(body, 'api.php').subscribe((res: any) => {
        this.kisi_adi = res.result[0].fullname;
        this.en_iyi_puan = res.result[0].puan;
      });
    });
  }

  async BilgileriDuzenle(){
    this.router.navigate(['/crud/' + this.user_id]);
  }
  
  async SinavaBasla(){
    this.router.navigate(['/sinav/' + this.sinav]);
  }

  async tryLogout(){
    this.storage.clear();
    this.navctrl.navigateRoot('/login');
    const toast = await this.toastctrl.create({
      message: 'Çıkış Yapılıyor..',
      duration: 1500
    });
    toast.present();
  }

  async presentToast(a){
    const toast = await this.toastctrl.create({
      message: a,
      duration: 1500
    });
    toast.present();
  }

}
