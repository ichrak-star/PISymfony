import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { EntreneurComponent } from './entreneur.component';

describe('EntreneurComponent', () => {
  let component: EntreneurComponent;
  let fixture: ComponentFixture<EntreneurComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ EntreneurComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(EntreneurComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
