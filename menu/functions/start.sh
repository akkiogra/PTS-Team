#!/bin/bash
#
# Title:      PTS major file
# org.Author(s):  Admin9705 - Deiteq
# Mod from MrDoob for PTS
# GNU:        General Public License v3.0
################################################################################
source /opt/plexguide/menu/functions/functions.sh
source /opt/plexguide/menu/functions/install.sh
declare NY='\033[0;33m'
declare NC='\033[0m'
declare NG='\033[1;32m'
update="🌟 Update Available!🌟"

sudocheck() {
    if [[ $EUID -ne 0 ]]; then
    tee <<-EOF
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
⚠️  You Must Execute as a SUDO USER (with sudo) or as ROOT!
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
EOF
        exit 0
    fi
}

downloadpg() {
    rm -rf /opt/plexguide
    git clone --single-branch https://github.com/Pandaura/PTS-Team.git /opt/plexguide  1>/dev/null 2>&1
    ansible-playbook /opt/plexguide/menu/version/missing_pull.yml
    ansible-playbook /opt/plexguide/menu/alias/alias.yml  1>/dev/null 2>&1
    rm -rf /opt/plexguide/place.holder >/dev/null 2>&1
    rm -rf /opt/plexguide/.git* >/dev/null 2>&1
}

missingpull() {
    file="/opt/plexguide/menu/functions/install.sh"
    if [ ! -e "$file" ]; then
    tee <<-EOF

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
⚠️  Base folder is missing!
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

EOF
        sleep 2
    tee <<-EOF

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
🛈  Re-Downloading Pandaura
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
EOF
        sleep 2
        downloadpg
    tee <<-EOF

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
✅️  Repair Complete. Standby!
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

EOF
        sleep 2
    fi
}

exitcheck() {
    bash /opt/plexguide/menu/version/file.sh
    file="/var/plexguide/exited.upgrade"
    if [ ! -e "$file" ]; then
        bash /opt/plexguide/menu/interface/ending.sh
    else
        rm -rf /var/plexguide/exited.upgrade 1>/dev/null 2>&1
        echo ""
        bash /opt/plexguide/menu/interface/ending.sh
    fi
}
  edition=$(cat /var/plexguide/pg.edition)
  serverid=$(cat /var/plexguide/server.id)
  pgnumber=$(cat /var/plexguide/pg.number)

top_menu() {

    if [[ $# -eq 0 ]]; then
    menu=$pgnumber
    else
    menu=$1
    fi
    # Menu Interface
  tee <<-EOF
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
🛈 $transport               $menu                     ID: $serverid
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
- SB-API Access: 🟢   - Internal API Access: 🟢   - $(echo -e $Memory)
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
                                                  $(echo -e $update) 
Disk Used Space: $used of $capacity | $percentage Used Capacity
EOF
}

disk_space_used_space() {
      # Displays Second Drive of GCE
  edition=$(cat /var/plexguide/pg.server.deploy)
  if [ "$edition" == "feeder" ]; then
    used_gce=$(df -h /mnt --local | tail -n +2 | awk '{print $3}')
    capacity_gce=$(df -h /mnt --local | tail -n +2 | awk '{print $2}')
    percentage_gce=$(df -h /mnt --local | tail -n +2 | awk '{print $5}')
    echo " GCE disk used space: $used_gce of $capacity_gce | $percentage_gce Used Capacity"
  fi

  disktwo=$(cat "/var/plexguide/server.hd.path")
  if [ "$edition" != "feeder" ]; then
    used_gce2=$(df -h "$disktwo" --local | tail -n +2 | awk '{print $3}')
    capacity_gce2=$(df -h "$disktwo" --local | tail -n +2 | awk '{print $2}')
    percentage_gce2=$(df -h "$disktwo" --local | tail -n +2 | awk '{print $5}')

    if [[ "$disktwo" != "/mnt" ]]; then
      echo " 2nd disk used space: $used_gce2 of $capacity_gce2 | $percentage_gce2 Used Capacity"
    fi
  fi
}

main_menu() {
  # For PG UI - Force Variable to Set
  ports=$(cat /var/plexguide/server.ports)
  if [ "$ports" == "" ]; then
    echo "🔴" >$filevg/pg.ports
  else echo "🟢" >$filevg/pg.ports; fi
      tee <<-EOF

[1]  Networking     : Reverse Proxy | Domain Setup                   
[2]  Security       : Secure your server                             
[3]  Mount          : Mount Cloud Based Storage                      
[4]  Apps           : Apps ~ Core, Community & Removal                
[5]  Vault          : Backup & Restore                               
-------------------------------------------------------------------------
[8] Tools           : Tools
[9] IRC             : Matrix chat client to Discord
[0] Settings        : Settings
EOF
}

end_menu() {
    tee <<-EOF
_________________________________________________________________________
                                                                [Z]  Exit
https://discord.sudobox.io                            https://sudobox.io/
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
EOF
}
end_menu_back() {
    tee <<-EOF
_________________________________________________________________________
                                                                [Z]  Back
https://discord.sudobox.io                            https://sudobox.io/
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
EOF
}
sub_menu_networking() { # first sub menu

  tee <<-EOF

[1]$(echo -e ${NG}Networking${NC})     : Reverse Proxy | Domain Setup                   
    [E] Reverse Proxy    - Setup a domain using Traefik              [🟢 ]
[2]  Security       : Secure your server                             
[3]  Mount          : Mount Cloud Based Storage                      
[4]  Apps           : Apps ~ Core, Community & Removal                
[5]  Vault          : Backup & Restore                               
-------------------------------------------------------------------------
[8] Tools           : Tools
[9] IRC             : Matrix chat client to Discord
[0] Settings        : Settings

EOF
  }

sub_menu_security() { # Menu Interface
  tee <<-EOF

[1]  Networking     : Reverse Proxy | Domain Setup                   
[2]  $(echo -e ${NG}Security${NC})       : Secure your server                             
    [E] Authelia    - Single Sign-On MFA Portal                      [🟢 ]
    [D] PortGuard   - Close vulnerable container ports               [🟢 ]
    [C] VPN         - Setup a secure network                         [🟢 ]
[3]  Mount          : Mount Cloud Based Storage                      
[4]  Apps           : Apps ~ Core, Community & Removal               
[5]  Vault          : Backup & Restore                               
-------------------------------------------------------------------------
[8] Tools           : Tools
[9] IRC             : Matrix chat client to Discord
[0] Settings        : Settings

EOF
  }

sub_menu_mount() { # first sub menu

  tee <<-EOF

[1]Networking     : Reverse Proxy | Domain Setup                   
[2]  Security       : Secure your server                             
[3]  $(echo -e ${NG}Mount${NC})          : Mount Cloud Based Storage
    [E] Deploy Mount
    [D] Deploy Uploader
    [C] Add keys
    --$(echo -e ${NY}UPDATE MOUNT DETAILS${NC})--
    [R] Update credentials        - Setup a secure network             
    [F] Update mount options         - Setup a secure network
[4]  Apps           : Apps ~ Core, Community & Removal                
[5]  Vault          : Backup & Restore                               
-------------------------------------------------------------------------
[8] Tools           : Tools
[9] IRC             : Matrix chat client to Discord
[0] Settings        : Settings

EOF
  }

sub_menu_app() { # Menu Interface
  tee <<-EOF

[1]  Networking     : Reverse Proxy | Domain Setup                   
[2]  Security       : Secure your server                             
[3]  Mount          : Mount Cloud Based Storage                      
[4]  $(echo -e ${NG}Apps${NC})           : Apps ~ Core, Community & Removal
    --$(echo -e ${NY}INSTALL${NC})--
    [E] Core                                      11/11
    [D] Community apps                            11/11
    [C] Personal apps
    --$(echo -e ${NY}REMOVE${NC})--
    [R] Remove apps
    [F] Full wipe (appdata too) # needs research
    --$(echo -e ${NY}UPDATE${NC})--
    [V] Update app
    [T] Update app subdomain
    --$(echo -e ${NY}THEMES${NC})--
[5]  Vault          : Backup & Restore                               
-------------------------------------------------------------------------
[8] Tools           : Tools
[9] IRC             : Matrix chat client to Discord
[0] Settings        : Settings

EOF
  }

  sub_menu_vault() { # Menu Interface
  tee <<-EOF

[1]  Networking     : Reverse Proxy | Domain Setup                   
[2]  Security       : Secure your server                             
[3]  Mount          : Mount Cloud Based Storage                      
[4]  Apps$          : Apps ~ Core, Community & Removal
[5]  $(echo -e ${NG}Vault${NC})          : Backup & Restore
    --$(echo -e ${NY}BACKUP${NC})--       
    [E] Backup a container                                     11/11
    [D] Backup all                            
    --$(echo -e ${NY}RESTORE${NC})--
    [C] Restore a container
    [R] Restore all
    --$(echo -e ${NY}Processing Location${NC})--
    [F] Change location 
-------------------------------------------------------------------------
[8] Tools           : Tools
[9] IRC             : Matrix chat client to Discord
[0] Settings        : Settings

EOF
  }