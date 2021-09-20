Title: cache_controller
Description: Cache controller for checking DB record preload
Technologies: PHP OOP
Author: Bartolomej Elias
Further informations: using database table fore base data and JSON structure for cache


Requested features:

    1. Accept & check get parameter - DONE
    
    2. If available: process it, if not, write out its need - DONE
    
    3. Check if record with called ID is in cache:
    
        A - If yes, return it from cache - DONE
        
        B - If not available then get data from DB and add to cache - DONE
        
    4. Increase number of queries for this record by one according to ID - DONE
    
Implementation:

    1. Download repository
    
    2. Import database product_cache.sql
    
    3. Check connection settings in conf/dbconnect.php
    
    4. Start app under webserver relevant for PHP and MySQL (MariaDB)
    
    5. Access application on implemented path with parameter: ?record_id=NUMBER - example: ?record_id=6
