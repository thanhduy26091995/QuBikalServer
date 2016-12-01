<?php
exec('node/bin/npm install -g firebase-tools');
exec('node/bin/npm firebase login');
exec('node/bin/npm firebase init');
exec('node/bin/npm firebase deploy');
