#!/bin/bash
#
# Title:      PTS ServerID
# org. Author(s):  Admin9705 - Deiteq
# Mod from MrDoob for PTS
# GNU:        General Public License v3.0
################################################################################
source /opt/plexguide/menu/functions/functions.sh
abc="/var/plexguide"
################################################################################
serverid() {
  declare NF='\033[1;32m'
  declare NC='\033[0m'
  tee <<-EOF

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
🛈 Establishing Server ID     -  Please use one word & keep it simple
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
EOF
  read -p '💬  TYPE Server ID | Press [ENTER]: ' typed </dev/tty

  if [[ "$typed" == "" ]]; then
    tee <<-EOF

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
⚠️ WARNING! - The Server ID cannot be left blank!
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
EOF
    sleep 1
    serverid
  else
    tee <<-EOF

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
✅️ PASS: Server ID $(echo -e ${NF}$typed${NC}) established
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
EOF
    echo "$typed" >${abc}/server.id
	recreatefolder
	sleep 1
  fi
}
####################################
serveridnew() {
  declare NF='\033[1;32m'
  declare NC='\033[0m'
  tee <<-EOF

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
🛈 Establishing new Server ID   -  Please use one word & keep it simple
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
EOF
  read -p '💬  TYPE Server ID | Press [ENTER]: ' typed </dev/tty

  if [[ "$typed" == "" ]]; then
    tee <<-EOF

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
⚠️ WARNING! - The Server ID cannot be left blank!
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
EOF
    sleep 1
    question1
  else
    tee <<-EOF

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
✅️ PASS: Server ID $(echo -e ${NF}typed${NC}) established
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
EOF
    echo "$typed" >${abc}/server.id
	recreatefolder
	sleep 1
  fi
}

recreatefolder() {
conf="/opt/appdata/plexguide/rclone.conf"
if [[ -e "$conf" ]]; then
        start=$(cat /var/plexguide/server.id)
        serveridcreate=$(tree -d -L 1 /mnt/gdrive/plexguide/backup | awk '{print $2}' | tail -n +2 | head -n -2 | grep "$(cat /var/plexguide/server.id)")
        if [[ $start != $serveridcreate ]]; then
        rclone mkdir gdrive:/plexguide/backup/$(cat /var/plexguide/server.id) --config /opt/appdata/plexguide/rclone.conf;fi
tee <<-EOF
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
✅ PASS: Backup folder created on GDrive
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
EOF
fi
}

##### set new server id  interface

setupnew(){

status=$(cat /var/plexguide/server.id)

  tee <<-EOF

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
🛈 Establishing new Server ID   -  Use one word & keep it simple
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
[1] Deploy new ServerID
[2] Use existing ones                     [ $status ]

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
[Z] - Exit
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
EOF

  read -p '💬  Type Number | Press [ENTER]: ' typed </dev/tty

  case $typed in
  1) serveridnew && clear && exit ;;
  2) clear && exit ;;
  z) exit ;;
  Z) exit ;;
  *) badinput ;;
  esac
}