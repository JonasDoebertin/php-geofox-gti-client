<p align="center">🚧 This project is still under early development and <strong>not</strong> ready for production use. 🚧</p>

# Geofox GTI Client

PHP wrapper for the Geofox Thin Interface (GTI) serving public transportation data for Hamburg.

## Todo

This project is still under early development and not ready for production use.

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
  - [ ] Response
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

- [ ] AnnouncementFilterPlannedType
- [ ] AnnouncementReason
- [ ] AttributeType
- [ ] ButtonType
- [x] CoordinateType
- [ ] ElevatorState
- [ ] ExtraFareType
- [x] FilterType
- [ ] FilterServiceType
- [x] Language
- [ ] LineModificationType
- [ ] LocationType
- [x] ModificationType
- [x] Platform
- [ ] RealtimeType
- [ ] RegionType
- [x] ReturnCode
- [x] SdType
- [ ] SegmentSelector
- [x] SimpleServiceType
- [ ] TariffRegionType
- [x] VehicleType

## Objects

- [ ] Announcement
- [ ] Attribute
- [ ] ContSearchByServiceId
- [x] Coordinate
- [x] FilterEntry
- [x] GtiTime
- [x] JourneySdName
- [ ] Link
- [ ] Location
- [x] RegionalSdName
- [ ] Schedule
- [ ] ScheduleElement
- [x] SdName
- [ ] Service
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
