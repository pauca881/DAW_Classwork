import { ComponentFixture, TestBed } from '@angular/core/testing';

import { Compo7Component } from './compo7.component';

describe('Compo7Component', () => {
  let component: Compo7Component;
  let fixture: ComponentFixture<Compo7Component>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [Compo7Component]
    })
    .compileComponents();

    fixture = TestBed.createComponent(Compo7Component);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
