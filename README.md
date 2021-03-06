# HSTS Header Plugin

This plugin allows you to set the HTTP HSTS Header in a template.

## Usage

### {exp:hsts_header}

#### Example Usage

This is a single tag that will set the HSTS header to sensible default values or whatever you specify for the parameters available.

##### Simple usage

&nbsp;&nbsp;&nbsp; `{exp:hsts_header}`

This will set the header using default values, equivalent to 

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; `Header set Strict-Transport-Security max-age=86400`

##### Advanced usage

&nbsp;&nbsp;&nbsp; `{exp:hsts_header max_age="31415926" include_sub_domains="yes" preload="yes"}`

This will set a header equivalent to 

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; `Header set Strict-Transport-Security max-age=31415926; includeSubDomains; preload`

#### Parameters

- `max_age=` (value) - Sets the value for the max-age parameter, ignored if set to non-value (default `max_age="86400"`)
- `include_sub_domains=` (yes/no) - Determines whether the includeSubDomains flag is set (default `include_sub_domains="no"`)
- `preload=` (yes/no) - Determines whether the `preload` flag is set (default `preload="no"`)

#### More information

More information on the Strict-Transport-Security header from [OWASP](https://www.owasp.org/index.php/HTTP_Strict_Transport_Security_Cheat_Sheet)

## Change Log

### 1.0.1

- Updated to improve clarity of header generated (spaces, no quotes)
- Remove the env_https variable as not part of standard

### 1.0.0

- Initial release. Whoop!

## License
Updated: 17 January 2019

Copyright 2018, 2019 [JCOGS Design](https://JCOGS.net). Licensed under the [Apache License, Version 2.0](https://github.com/JCOGSDesign/hsts_header/blob/master/LICENSE).
