import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ReferenciacionComponent } from './referenciacion.component';

describe('ReferenciacionComponent', () => {
  let component: ReferenciacionComponent;
  let fixture: ComponentFixture<ReferenciacionComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [ReferenciacionComponent]
    })
    .compileComponents();
    
    fixture = TestBed.createComponent(ReferenciacionComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
