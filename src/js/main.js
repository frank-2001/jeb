// Get nb notification no read
function getNbNotif() {
  if (db.get("user")) {
    $.post(
      "/server/?notifications_store-by",
      { id_user: db.get("user").id, state: "4" },
      function (data, textStatus, jqXHR) {
        nb = data.data.length;
        $("#nb_notification_no_read").text("");
        if (nb > 0) {
          $("#nb_notification_no_read").text(nb);
        }
      },
      "json"
    );
  }
}
getNbNotif();

function enableNotification() {
  Notification.requestPermission().then((permission) => {
    if (permission == "granted") {
      navigator.serviceWorker.ready.then((sw) => {
        sw.pushManager
          .subscribe({
            userVisibleOnly: true,
            applicationServerKey:
              "BNhvnz9Sj3HPvKQdS4XEHnmsLg1eq-dpYumHxQydMV927Jn2YskhPbiAJ5VsEW-_oQR0Ht1NsKSKUW02heMkvKE",
          })
          .then((sub) => {
            db.set("notification", sub);
            let data = {
              subscription_id: JSON.stringify(sub),
              creation: new Date().toLocaleString("fr-FR"),
            };
            if (db.get("gps")) {
              data["position"] = JSON.stringify(db.get("gps"));
            }
            if (db.get("user")) {
              data["id_user"] = db.get("user")["id"];
            }
            $.post(
              "/server/?notifications-new",
              data,
              function (d, textStatus, jqXHR) {},
              "json"
            ).fail((e) => {
              $.post(
                "/server/?notifications-by",
                { subscription_id: data.subscription_id },
                function (dt, textStatus, jqXHR) {
                  if (dt.data.length > 0) {
                    lacrea_save(data, "notifications-update=" + dt.data[0].id);
                  }
                },
                "json"
              );
            });
          })
          .catch((e) => {
            console.log(e);
          });
      });
    }
  });
}
function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(
      (position) => {
        position = {
          latitude: position.coords.latitude,
          longitude: position.coords.longitude,
          altitude: position.coords.altitude,
        };
        db.set("gps", position);
      },
      (error) => {
        console.error(error);
      }
    );
  }
}
// const img = "src/images/jeb24.webp";
// const text = `Coucou ! `;
// const notification = new Notification("Liste de trucs à faire", {
//   body: text,
//   icon: img,
//   badge: "icon.png",
// });
