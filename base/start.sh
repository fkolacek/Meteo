#!/bin/bash

export DISPLAY=:0
xset s noblank
xset s off
xset -dpms

python base.py &
sleep 5
xtrlock

