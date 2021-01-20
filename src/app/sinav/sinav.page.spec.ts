import { async, ComponentFixture, TestBed } from '@angular/core/testing';
import { IonicModule } from '@ionic/angular';

import { SinavPage } from './sinav.page';

describe('SinavPage', () => {
  let component: SinavPage;
  let fixture: ComponentFixture<SinavPage>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ SinavPage ],
      imports: [IonicModule.forRoot()]
    }).compileComponents();

    fixture = TestBed.createComponent(SinavPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  }));

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
