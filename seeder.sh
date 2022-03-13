# to seed the database with data
# run this from the command line
# ./seeder.sh

#!/usr/bin/env bash
php spark db:seed userRole
php spark db:seed user
php spark db:seed kriteria
php spark db:seed subkriteria
php spark db:seed pembobotan
php spark db:seed alternatif
