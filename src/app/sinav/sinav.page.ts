import { Component, OnInit } from '@angular/core';
import { Router, ActivatedRoute } from '@angular/router';
import { ToastController, AlertController, LoadingController, NavController } from '@ionic/angular';
import { threadId } from 'worker_threads';
//import { resolve } from 'dns';
//import { runInThisContext } from 'vm';
import { Storage } from '@ionic/storage';
import { AccessProviders } from '../providers/access-providers';

@Component({
  selector: 'app-sinav',
  templateUrl: './sinav.page.html',
  styleUrls: ['./sinav.page.scss'],
})
export class SinavPage implements OnInit {
    sinav: string;
    datastorage: any;
    cevaplar: any = [];
    gerceklerCevaplar: any = [];
    dogru : number = 0;
    yanlis : number = 0;
    user_id : number = 0;
    soru1 : string = "";
    soru2 : string = "";
    soru3 : string = "";
    soru4 : string = "";
    soru5 : string = "";
    soru6 : string = "";
    soru7 : string = "";
    soru8 : string = "";
    soru9 : string = "";
    soru10 : string = "";

    constructor(
      private router: Router,
      private toastctrl: ToastController,
      private alertctrl: AlertController,
      private loadingctrl: LoadingController,
      private accessproviders: AccessProviders,
      private actRounted: ActivatedRoute,
      private storage: Storage
    ) { }

  ngOnInit() {
    this.actRounted.params.subscribe((data: any) => {
      //console.log(data.sinav);
      this.sinav = data.sinav;
    });
  }

  ionViewDidEnter(){
    this.storage.get('storage_session').then((res) => {
      //console.log(res);
      this.datastorage = res;
      this.user_id = this.datastorage.user_id;
    });
  }

  async Gonder(){

    if(this.soru1 != "" && this.soru2 != "" && this.soru3 != "" && this.soru4 != "" && this.soru5 != "" 
    && this.soru6 != "" && this.soru7 != "" && this.soru8 != "" && this.soru9 != "" && this.soru10 != ""){
      var data = {
        cevap1: this.soru1,
        cevap2: this.soru2,
        cevap3: this.soru3,
        cevap4: this.soru4,
        cevap5: this.soru5,
        cevap6: this.soru6,
        cevap7: this.soru7,
        cevap8: this.soru8,
        cevap9: this.soru9,
        cevap10: this.soru10
      }
      this.cevaplar.push(data);

      var gdata = {
        cevap1: 'a',
        cevap2: 'e',
        cevap3: 'b',
        cevap4: 'a',
        cevap5: 'c',
        cevap6: 'd',
        cevap7: 'e',
        cevap8: 'b',
        cevap9: 'a',
        cevap10: 'e'
      }
      this.gerceklerCevaplar.push(gdata);
      //console.log(this.gerceklerCevaplar);
      //console.log(this.cevaplar);
      this.Sorgula();
    } else {
      this.presentToast("Cevaplamadığınız sorular var");
    }
  }

  async Sorgula(){
    if(this.cevaplar[0].cevap1 == this.gerceklerCevaplar[0].cevap1){
      this.dogru++;
    } else {
      this.yanlis++;
    }
    
    if(this.cevaplar[0].cevap2 == this.gerceklerCevaplar[0].cevap2){
      this.dogru++;
    } else {
      this.yanlis++;
    }
    
    if(this.cevaplar[0].cevap3 == this.gerceklerCevaplar[0].cevap3){
      this.dogru++;
    } else {
      this.yanlis++;
    }
    
    if(this.cevaplar[0].cevap4 == this.gerceklerCevaplar[0].cevap4){
      this.dogru++;
    } else {
      this.yanlis++;
    }
    
    if(this.cevaplar[0].cevap5 == this.gerceklerCevaplar[0].cevap5){
      this.dogru++;
    } else {
      this.yanlis++;
    }
    
    if(this.cevaplar[0].cevap6 == this.gerceklerCevaplar[0].cevap6){
      this.dogru++;
    } else {
      this.yanlis++;
    }
    
    if(this.cevaplar[0].cevap7 == this.gerceklerCevaplar[0].cevap7){
      this.dogru++;
    } else {
      this.yanlis++;
    }
    
    if(this.cevaplar[0].cevap8 == this.gerceklerCevaplar[0].cevap8){
      this.dogru++;
    } else {
      this.yanlis++;
    }
    
    if(this.cevaplar[0].cevap9 == this.gerceklerCevaplar[0].cevap9){
      this.dogru++;
    } else {
      this.yanlis++;
    }
    if(this.cevaplar[0].cevap10 == this.gerceklerCevaplar[0].cevap10){
      this.dogru++;
    } else {
      this.yanlis++;
    }
    //console.log(this.dogru + " - " + this.yanlis);

    return new Promise(resolve => {
      let body = {
        action: 'sonuclari_gir',
        user_id : this.user_id,
        dogru : this.dogru,
        yanlis : this.yanlis
      }
      this.accessproviders.postData(body, 'api.php').subscribe((res: any) => {
        if(res.success == true){
          this.presentToast("Sonuçlar Oluşturuldu");
          this.router.navigate(['/anasayfa']);
        } else {
          this.presentToast("Hata Oldu.");
        }
      });
    });

  }

  async presentToast(mesaj){
    const toast = await this.toastctrl.create({
      message: mesaj,
      duration: 1500
    });
    toast.present();
  }
}
