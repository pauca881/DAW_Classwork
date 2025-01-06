import { ComponentFixture, TestBed } from '@angular/core/testing';

import { Compo5Component } from './compo5.component';

describe('Compo5Component', () => {
  let component: Compo5Component;
  let fixture: ComponentFixture<Compo5Component>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [Compo5Component]
    })
    .compileComponents();

    fixture = TestBed.createComponent(Compo5Component);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
