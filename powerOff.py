import pycurl
from io import StringIO

c = pycurl.Curl()
url = "https://192.168.0.12/dbbroker"
c.setopt(c.URL, url)
c.setopt(pycurl.USERPWD, "%s:%s" % ("admin", "Chateaulin!"))
c.setopt(c.SSL_VERIFYPEER, 0) # That is you key line for this purpose!
c.setopt(pycurl.SSL_VERIFYHOST,0)
c.setopt(pycurl.HTTPHEADER, ["Content-Type: application/x-www-form-urlencoded;"])
c.setopt(pycurl.HTTPHEADER, ["X-Requested-With: XMLHttpRequest"])
c.setopt(pycurl.POST, 1)
c.setopt(pycurl.POSTFIELDS, "<?xml version=\"1.0\" encoding=\"UTF-8\"?>             <xs:nml xmlns:xs=\"http://www.netgear.com/protocol/transaction/NMLSchema-0.9\" xmlns=\"urn:netgear:nas:readynasd\" src=\"dpv_1368497621000\" dst=\"nas\">                <xs:transaction id=\"njl_id_1278\">                    <xs:custom id=\"njl_id_1277\" name=\"Halt\" resource-id=\"Shutdown\" resource-type=\"System\">                    <Shutdown halt=\"true\" fsck=\"false\"/>                </xs:custom>                </xs:transaction>            </xs:nml>")
c.perform()
