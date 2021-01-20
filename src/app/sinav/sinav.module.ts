import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { SinavPageRoutingModule } from './sinav-routing.module';

import { SinavPage } from './sinav.page';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    SinavPageRoutingModule
  ],
  declarations: [SinavPage]
})
export class SinavPageModule {}
