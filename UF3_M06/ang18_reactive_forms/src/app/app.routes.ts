import { Routes } from '@angular/router';
import { Compo1Component } from './components/compo1/compo1.component';
import { Compo2Component } from './components/compo2/compo2.component';
import { Page404Component } from './components/page404/page404.component';
import { Compo5Component } from './components/compo5/compo5.component';

export const routes: Routes = [

{
    path:'',
    component: Compo1Component
},
{
    path:'home',
    component: Compo1Component
},
{
    path:'forms',
    component:Compo2Component
},
{
    path:'inscripcio',
    component:Compo5Component
},
{
    path:'**',
    component: Page404Component
}

];
