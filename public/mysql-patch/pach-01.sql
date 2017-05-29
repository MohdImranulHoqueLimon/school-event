ALTER TABLE users ADD profession VARCHAR(100) after batch;
ALTER TABLE users ADD permanent_address VARCHAR(250) after address;
alter table users add permanent_city varchar(150) after city;




new file: app/Models/Countries.php
new file: app/Services/CountryService.php
new file: resources/views/countries.blade.php

app/Http/Controllers/Admin/UsersController.php

app/Repositories/Admin/UserRepository.php

resources/views/admin/users/form.blade.php
resources/views/admin/users/show.blade.php

resources/views/auth/register.blade.php


