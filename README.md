<p align="center">🚧 This project is still under early development and <strong>not</strong> ready for production use. 🚧</p>

<p align="center">
<a href="https://packagist.org/packages/jdpowered/geofox-gti-client"><img src="https://poser.pugx.org/jdpowered/geofox-gti-client/v/stable?format=flat-square" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/jdpowered/geofox-gti-client"><img src="https://poser.pugx.org/jdpowered/geofox-gti-client/v/unstable?format=flat-square" alt="Latest Unstable Version"></a>
<a href="https://travis-ci.org/JonasDoebertin/php-geofox-gti-client"><img src="https://travis-ci.org/JonasDoebertin/php-geofox-gti-client.svg?branch=master" alt="Build Status"></a>
<a href="https://styleci.io/repos/123781940"><img src="https://styleci.io/repos/123781940/shield?branch=master" alt="StyleCI"></a>
<a href="https://packagist.org/packages/jdpowered/geofox-gti-client"><img src="https://poser.pugx.org/jdpowered/geofox-gti-client/license?format=flat-square" alt="License"></a>
</p>

# Geofox GTI Client

PHP wrapper for the Geofox Thin Interface (GTI) serving public transportation data for Hamburg.

## Todo

This project is still under early development and not ready for production use. Only

### API Methods

- [ ] **init**
  - [x] Request
  - [x] Response
- [ ] **checkName**
  - [ ] Request
  - [ ] Response
- [ ] **getRoute**
  - [ ] Request
  - [ ] Response
- [ ] **departureList**
  - [x] Request
  - [x] Response
- [ ] **getTariff**
  - [ ] Request
  - [ ] Response
- [ ] **departureCourse**
  - [ ] Request
  - [ ] Response
- [ ] **listStations**
  - [x] Request
  - [x] Response
- [ ] **listLines**
  - [ ] Request
  - [ ] Response
- [ ] **getAnnouncements**
  - [ ] Request
  - [ ] Response
- [ ] **checkPostalCode**
  - [ ] Request
  - [ ] Response
- [ ] **getVehicleMap**
  - [ ] Request
  - [ ] Response
- [ ] **getTrackCoordinates**
  - [ ] Request
  - [ ] Response
- [ ] **getIndividualRoute**
  - [ ] Request
  - [ ] Response

### Enums

- [x] AnnouncementFilterPlannedType
- [ ] AnnouncementReason
- [x] AttributeType
- [x] ButtonType
- [x] CoordinateType
- [x] ElevatorState
- [x] ExtraFareType
- [x] FilterType
- [x] FilterServiceType
- [x] Language
- [x] LineModificationType
- [ ] LocationType
- [x] ModificationType
- [x] Platform
- [x] RealtimeType
- [x] ReturnCode
- [x] SdType
- [x] SegmentSelector
- [x] SimpleServiceType
- [x] TariffRegionType
- [x] VehicleType

## Objects

- [ ] Announcement
- [x] Attribute
- [ ] ContSearchByServiceId
- [x] Coordinate
- [x] Departure
- [x] FilterEntry
- [x] GtiTime
- [x] JourneySdName
- [ ] Link
- [ ] Location
- [x] RegionalSdName
- [ ] Schedule
- [ ] ScheduleElement
- [x] SdName
- [x] Service
- [x] ServiceType
- [x] StationListEntry
- [ ] TariffDetails
- [ ] TariffInfo
- [ ] TariffInfoSelector
- [ ] TariffRegionInfo
- [ ] TariffRegionList
- [ ] TicketInfo

## Installation

```bash
composer require jdpowered/geofox-gti-client
```

## Usage

[TODO]

## Security Vulnerabilities

If you discover a security vulnerability within Geofox GTI Client, please send an email to Jonas Döbertin via [hello@jd-powered.net](mailto:hello@jd-powered.net). All security vulnerabilities will be promptly addressed.

## License

This Geofox GTI Client is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
