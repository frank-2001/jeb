function navbar() {
  if (db.get("user")) {
    $(".btn_connexion").html(
      `
                <svg style="width: 20px"  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
                <span>
                ${db.get("user").nom}
                </span>
            `
    );
  } else {
    $(".btn_connexion").text("Connexion");
  }
}
navbar();

$(".btn_connexion").click(function (e) {
  e.preventDefault();
  profile();
});

function profile() {
  if (db.get("user")) {
    if (db.get("user").type == "utilisateur") {
      lacrea_load(".body", "apps/profile/user.html");
    } else {
      lacrea_load(".body", "apps/profile/admin.html");
    }
  } else {
    $(".login").removeClass("hidden");
    $(".login>div").toggleClass("hidden");
  }
}

function command(title, price, state) {
  if (state != "1") {
    swal("Desolé ce produit n'est pas disponible pour l'instant");
    if (!confirm("Voulez-vous malgré tout commander le produit")) {
      return;
    }
  }
  quatity = prompt(`Quel quantité de ${title} voulez-vous commander svp? `);
  if (quatity) {
    msg = `Le cout de votre commande est de ${
      price * quatity
    }$,nous allons maintenant vous rediriger vers notre service client pour finaliser la commande!!`;
    wp = `https://wa.me/+243994557806?text=Message venant de https://jeb-elevage.org, salut je commande *${quatity}* unite(kg, piece, litre) de *${title}*, PU : *${price}$*, PT : 
    *${price * quatity}$`;
    swal({
      icon: "success",
      title: "Commande envoyée avec succes",
      text: msg,
    });
    window.open(wp);
  }
}

function formation(titre, id) {
  window.open(
    `https://wa.me/+243994557806?text=Message venant de https://jeb-elevage.org, salut je suis interessé par la formation  *${titre}*`
  );
}
