import { NgModule } from '@angular/core';
import { IonicPageModule } from 'ionic-angular';
import { PicviewPage } from './picview';

@NgModule({
  declarations: [
    PicviewPage,
  ],
  imports: [
    IonicPageModule.forChild(PicviewPage),
  ],
})
export class PicviewPageModule {}
