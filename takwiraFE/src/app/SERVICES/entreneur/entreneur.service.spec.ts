import { TestBed } from '@angular/core/testing';

import { EntreneurService } from './entreneur.service';

describe('EntreneurService', () => {
  let service: EntreneurService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(EntreneurService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
