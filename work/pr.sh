#!/usr/bin/env bash
# Create a Pull Request on BitBucket from current branch
# NOTE: branch must exist on server already

# file `pr-user.sh` must have following contents:
# CREDENTIALS="bb_user:bb_pass";
# REVIEWER="username";
source $(dirname $0)/pr-user.sh

REPO="username/reponame"
BRANCH=`git rev-parse --abbrev-ref HEAD`
TITLE=`git log -1 --format=%s`

read -d '' JSON << EOF
{
     "title": "$TITLE",
     "source": {
         "branch": {
             "name": "$BRANCH"
         },
         "repository": {
             "full_name": "$REPO"
         }
     },
     "destination": {
         "branch": {
             "name": "master"
         }
      },
     "reviewers": [
         {
             "username": "$REVIEWER"
         }
     ],
     "close_source_branch": true
 }
EOF

URL=https://bitbucket.org/api/2.0/repositories/$REPO/pullrequests
RESPONSE=`curl --silent -X POST -H "Content-Type: application/json" -u $CREDENTIALS $URL -d "$JSON"`

# Display URL to newly created PR
PR_URL=`echo $RESPONSE | php -r '$res=json_decode(file_get_contents("php://stdin"), true); print $res["links"]["html"]["href"];'`
echo
echo "Check PR in the browser:"
echo $PR_URL
