## persentase-penduduk-bekerja

[![Join the chat at https://gitter.im/persentase-penduduk-bekerja/Lobby](https://badges.gitter.im/persentase-penduduk-bekerja/Lobby.svg)](https://gitter.im/persentase-penduduk-bekerja/Lobby?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/bantenprov/persentase-penduduk-bekerja/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/bantenprov/persentase-penduduk-bekerja/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/bantenprov/persentase-penduduk-bekerja/badges/build.png?b=master)](https://scrutinizer-ci.com/g/bantenprov/persentase-penduduk-bekerja/build-status/master)

Persentase Penduduk Bekerja (APK)

## install via composer

- Development snapshot
```bash
$ composer require bantenprov/persentase-penduduk-bekerja:dev-master
```
- Latest release:

```bash
$ composer require bantenprov/persentase-penduduk-bekerja:v0.1.0
```

## download via github
~~~
bash
$ git clone https://github.com/bantenprov/persentase-penduduk-bekerja.git
~~~


#### Edit `config/app.php` :
```php

'providers' => [

    /*
    * Laravel Framework Service Providers...
    */
    Illuminate\Auth\AuthServiceProvider::class,
    Illuminate\Broadcasting\BroadcastServiceProvider::class,
    Illuminate\Bus\BusServiceProvider::class,
    Illuminate\Cache\CacheServiceProvider::class,
    Illuminate\Foundation\Providers\ConsoleSupportServiceProvider::class,
    Illuminate\Cookie\CookieServiceProvider::class,
    //....
    Bantenprov\PPBekerja\PPBekerjaServiceProvider::class,

```

#### Untuk publish component vue :

```bash
$ php artisan vendor:publish --tag=pp-bekerja-assets
$ php artisan vendor:publish --tag=pp-bekerja-public
```
#### Tambahkan route di dalam route : `resources/assets/js/routes.js` :

```javascript
path: '/dashboard',
component: layout('Default'),
children: [
  {
    path: '/dashboard',
    components: {
      main: resolve => require(['./components/views/DashboardHome.vue'], resolve),
      navbar: resolve => require(['./components/Navbar.vue'], resolve),
      sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
    },
    meta: {
      title: "Dashboard"
    }
  },
  //== ...
  {
    path: '/dashboard/pp-bekerja',
    components: {
      main: resolve => require(['./components/views/bantenprov/pp-bekerja/DashboardPPBekerja.vue'], resolve),
      navbar: resolve => require(['./components/Navbar.vue'], resolve),
      sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
    },
    meta: {
      title: "AP Kasar"
    }
  }
```

```javascript
{
path: '/admin',
redirect: '/admin/dashboard',
component: resolve => require(['./AdminLayout.vue'], resolve),
children: [
//== ...
    {
      path: '/admin/dashboard/pp-bekerja',
      components: {
        main: resolve => require(['./components/bantenprov/pp-bekerja/PPBekerjaAdmin.show.vue'], resolve),
        navbar: resolve => require(['./components/Navbar.vue'], resolve),
        sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
      },
      meta: {
        title: "AP Kasar"
      }
    }
 //== ...   
  ]
},

```
#### Edit menu `resources/assets/js/menu.js`

```javascript
{
  name: 'Dashboard',
  icon: 'fa fa-dashboard',
  childType: 'collapse',
  childItem: [
        {
          name: 'Dashboard',
          link: '/dashboard',
          icon: 'fa fa-angle-double-right'
        },
        {
          name: 'Entity',
          link: '/dashboard/entity',
          icon: 'fa fa-angle-double-right'
        },
        //== ...
        {
          name: 'Persentase Penduduk Bekerja',
          link: '/dashboard/pp-bekerja',
          icon: 'fa fa-angle-double-right'
        }
  ]
},
//== ...
        {
          name: 'Persentase Penduduk Bekerja',
          link: '/admin/dashboard/pp-bekerja',
          icon: 'fa fa-angle-double-right'
        },
```

#### Tambahkan components `resources/assets/js/components.js` :

```javascript

import PPBekerja from './components/bantenprov/pp-bekerja/PPBekerja.chart.vue';
Vue.component('echarts-pp-bekerja', PPBekerja);

import PPBekerjaKota from './components/bantenprov/pp-bekerja/PPBekerjaKota.chart.vue';
Vue.component('echarts-pp-bekerja-kota', PPBekerjaKota);

import PPBekerjaTahun from './components/bantenprov/pp-bekerja/PPBekerjaTahun.chart.vue';
Vue.component('echarts-pp-bekerja-tahun', PPBekerjaTahun);

import PPBekerjaAdminShow from './components/bantenprov/pp-bekerja/PPBekerjaAdmin.show.vue';
Vue.component('admin-view-pp-bekerja-tahun', PPBekerjaAdminShow);

//== Echarts Angka Partisipasi Kasar

import PPBekerjaBar01 from './components/views/bantenprov/pp-bekerja/PPBekerjaBar01.vue';
Vue.component('pp-bekerja-bar-01', PPBekerjaBar01);

import PPBekerjaBar02 from './components/views/bantenprov/pp-bekerja/PPBekerjaBar02.vue';
Vue.component('pp-bekerja-bar-02', PPBekerjaBar02);

//== mini bar charts
import PPBekerjaBar03 from './components/views/bantenprov/pp-bekerja/PPBekerjaBar03.vue';
Vue.component('pp-bekerja-bar-03', PPBekerjaBar03);

import PPBekerjaPie01 from './components/views/bantenprov/pp-bekerja/PPBekerjaPie01.vue';
Vue.component('pp-bekerja-pie-01', PPBekerjaPie01);

import PPBekerjaPie02 from './components/views/bantenprov/pp-bekerja/PPBekerjaPie02.vue';
Vue.component('pp-bekerja-pie-02', PPBekerjaPie02);

//== mini pie charts
import PPBekerjaPie03 from './components/views/bantenprov/pp-bekerja/PPBekerjaPie03.vue';
Vue.component('pp-bekerja-pie-03', PPBekerjaPie03);
```
