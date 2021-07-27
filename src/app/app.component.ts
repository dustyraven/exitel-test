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

    address: string = '';
    geocodes: Geocode[] = [];

    constructor(
        private formBuilder: FormBuilder,
        private apiService: ApicallService
    ) { }

    onSubmit(): void {
        this.address = this.addressForm.value.address;
        if (!this.address) {
            return;
        }
        this.apiService.getGeocodes(this.address).subscribe(data => this.geocodes = data);
    }
}
