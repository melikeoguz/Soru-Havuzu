import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { SinavPage } from './sinav.page';

const routes: Routes = [
  {
    path: '',
    component: SinavPage
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class SinavPageRoutingModule {}
