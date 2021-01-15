#!/bin/bash

cd /home/tanmay/Satire
export PATH="$PATH:/home/tanmay/miniconda3/envs/satire_env/bin:/home/tanmay/miniconda3/bin:/home/tanmay/miniconda3/condabin:/home/tanmay/gelpia/bin:/home/tanmay/.local/bin:/snap/bin"
source activate satire_env
satire_command="python3 src/satire.py --std --file /var/www/html/satire/outputs/$1"
if [ $2 == true ]
then
	satire_command="${satire_command} --enable-abstraction --mindepth $3 --maxdepth $4"
fi
if [ $5 == true ]
then
	satire_command="${satire_command} --parallel"
fi
if [ $6 == true ]
then
	satire_command="${satire_command} --empirical $7"
fi
eval $satire_command
#echo $satire_command
source deactivate

