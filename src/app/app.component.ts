import { Component } from '@angular/core';
import { FormBuilder } from '@angular/forms';
import { ApicallService } from './apicall.service';
import { Geocode } from './geocode';

@Component({
    selector: 'app-root',
    templateUrl: './app.component.html',
    styleUrls: ['./app.component.sass']
})

export class AppComponent {
    title = 'test-app';

    addressForm = this.formBuilder.group({
        address: ''
    });

    geocodes: Geocode[] = [];

    constructor(
        private formBuilder: FormBuilder,
        private apiService: ApicallService
    ) { }

    onSubmit(): void {
        // this.apiService.getGeocode(this.addressForm.value.address).subscribe(data => console.log('DDD:', data));
        this.apiService.getGeocodes(this.addressForm.value.address).subscribe(data => {this.geocodes = data; console.log(this.geocodes);});

        // this.addressForm.reset();
    }
}
