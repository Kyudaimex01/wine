# Changelog

All notable changes to `laravel-permission` will be documented in this file

## 1.18.0 - 2019-03-01
- added support for Laravel 5.8
- Switched gate registration to use correct Authorizable contract (instead Authenticatable)

## 1.17.0 - 2018-08-24
- added support for Laravel 5.7

## 1.16.0 - 2018-02-07
- added support for Laravel 5.6

## 1.15 - 2017-12-08
- allow `hasAnyPermission` to take an array of permissions

## 1.14.1 - 2017-10-26
- fixed `Gate::before` for custom gate callbacks

## 1.14.0 - 2017-10-18
- refactor `PermissionRegistrar` to use `$gate->before()`
- removed `log_registration_exception` as it is no longer relevant

## 1.13.0 - 2017-08-31
- added compatibility for Laravel 5.5

## 1.12.0

- made foreign key name to users table configurable

## 1.11.1

- `hasPermissionTo` uses the cache to avoid extra queries when it is called multiple times

## 1.11.0

- add `getDirectPermissions`, `getPermissionsViaRoles`, `getAllPermissions`

## 1.10.0 - 2017-02-22

- add `hasAnyPermission`

## 1.9.0 - 2017-02-20
- add `log_registration_exception` in settings file
- fix for ambiguous column name `id` when using the role scope 

## 1.8.0 - 2017-02-09
- `hasDirectPermission` method is now public

## 1.7.0 - 2016-01-23
- added support for Laravel 5.4

## 1.6.1 - 2016-01-19
- make exception logging more verbose

## 1.6.0 - 2016-12-27
- added `Role` scope

## 1.5.3 - 2016-12-15
- moved some things to `boot` method in SP to solve some compatibility problems with other packages

## 1.5.2 - 2016-08-26
- make compatible with L5.3

## 1.5.1 - 2016-07-23
- fixes `givePermissionTo` and `assignRole` in Laravel 5.1

## 1.5.0 - 2016-07-23
** this version does not work in Laravel 5.1, please upgrade to version 1.5.1 of this package

- allowed `givePermissonTo` to accept multiple permissions
- allowed `assignRole` to accept multiple roles
- added `syncPermissions`-method
- added `syncRoles`-method
- dropped support for PHP 5.5 and HHVM

## 1.4.0 - 2016-05-08
-  added `hasPermissionTo` function to the `Role` model

## 1.3.4 - 2016-02-27
-  `hasAnyRole` can now properly process an array

## 1.3.3 - 2016-02-24

- `hasDirectPermission` can now accept a string

## 1.3.2 - 2016-02-23

- fixed user table configuration

## 1.3.1 - 2016-01-10

- fixed bug when testing for non existing permissions

## 1.3.0 - 2015-12-25

- added compatibility for Laravel 5.2

## 1.2.1 - 2015-12-22

- use database_path to publish migrations

## 1.2.0 - 2015-10-28

###Added
- support for custom models

## 1.1.0 - 2015-10-12

### Added
- Blade directives 
- `hasAllRoles()`- and `hasAnyRole()`-functions

## 1.0.2 - 2015-10-11

### Fixed
- Fix for running phpunit locally

## 1.0.1 - 2015-09-30

### Fixed
- Fixed the inconsistent naming of the `hasPermission`-method.

## 1.0.0 - 2015-09-16

### Added
- Everything, initial release
