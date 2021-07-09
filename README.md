<h1 align="center">Welcome to Dutch Beer API 👋</h1>
<p>
  <a href="#" target="_blank">
    <img alt="License: MIT" src="https://img.shields.io/badge/License-MIT-yellow.svg" />
  </a>
</p>

> PHP REST API for Dutch beer data

## Author

👤 **Sander van der Windt**

* Website: windt.dev
* Github: [@sandervdwnl](https://github.com/sandervdwnl)

## Instructions

READ: 
  URL:../api/beer/read.php
URL: 

READ SINGLE:

  URL:../api/beer/read_single?id=[ID].php

CREATE:

  URL:../api/beer/create.php
  In the body the data 
  {
    "id": [ID];
    "beer" : [NAME BEER],
    etc..
  }

UPDATE:

  URL:../api/beer/update.php
    In the body the new data 
    {
      "id": [ID];
      "beer" : [NAME BEER],
      etc..
    }

DELETE:
URL:../api/beer/delete.php
  In the body the id 
  {
    "id": [ID];
  }

## Show your support

Give a ⭐️ if this project helped you!

***
_This README was generated with ❤️ by [readme-md-generator](https://github.com/kefranabg/readme-md-generator)_