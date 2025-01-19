import { TestBed } from '@angular/core/testing';

import { ValidacioService } from './validacio.service';

describe('ValidacioService', () => {
  let service: ValidacioService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(ValidacioService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
