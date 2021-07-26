import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { MatcheComponent } from './matche.component';

describe('MatcheComponent', () => {
  let component: MatcheComponent;
  let fixture: ComponentFixture<MatcheComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ MatcheComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(MatcheComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
