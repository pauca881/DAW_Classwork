import { ComponentFixture, TestBed } from '@angular/core/testing';

import { Compo6Component } from './compo6.component';

describe('Compo6Component', () => {
  let component: Compo6Component;
  let fixture: ComponentFixture<Compo6Component>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [Compo6Component]
    })
    .compileComponents();

    fixture = TestBed.createComponent(Compo6Component);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
