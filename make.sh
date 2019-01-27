#!/bin/bash
rm -f files.tar
7z a -ttar -mx=9 files.tar ./files/*
rm -f eu.hanashi.wsc.teamspeak3-sync-jcoins.tar
7z a -ttar -mx=9 eu.hanashi.wsc.teamspeak3-sync-jcoins.tar ./* -x!files -x!eu.hanashi.wsc.teamspeak3-sync-jcoins.tar -x!.git -x!.gitignore -x!make.bat -x!make.sh