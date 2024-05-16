"use client";

import Footer from "../footer/Footer";
import "./voyageDetail.css";
import "bootstrap/dist/css/bootstrap.min.css";

export default function VoyageDetail({nom, image, prix, datedepart, datearrivee, description, moyentransport, pays, categorie,}) {
  return (
    <>
    <div className="voyageResume">
      <div className="voyageTeaser">
        {image && (
          <img
            className="voyageCardImage"
            width={500}
            height={350}
            src={image}
            alt={"Image de " + nom}
          />
        )}

        <div className="titre">
          <p className="voyageNom">{nom} </p>
          <p className="voyageDescription">{description}</p>
        </div>
      </div>

      <div className="voyageDetail">
       <div className="details">
        <p className="intitule">Pays</p>
        <p className="voyagePays">{pays}</p>

        <p className="intitule">Date de départ</p>
        <p className="voyageDateDepart">{datedepart}</p>

        <p className="intitule">Date de retour</p>
        <p className="voyageDateArrivee">{datearrivee}</p>

        <p className="intitule">Moyen de transport </p>
        <p className="voyageMoyenTransport">{moyentransport}</p>

        <p className="intitule">Catégorie</p>
        <p className="voyageCategorie">{categorie}</p>

        <p className="intitule">Prix</p>
        <p className="voyagePrix">{prix} € </p>
       </div> 
        <div className="formulaire">
        <h4>Demande de réservation</h4>
        <form>
          <div className="mb-3">
            <label for="prenom" className="form-label">Prénom</label>
            <input type="text" className="form-control" id="prenom"></input>
          </div>
          <div className="mb-3">
            <label for="nom" className="form-label">Nom</label>
            <input type="text" className="form-control" id="nom"></input>
          </div>
          <div className="mb-3">
            <label for="exampleInputEmail1" className="form-label">Email</label>
            <input type="email" className="form-control" id="exampleInputEmail1"></input>
          </div>
          <div className="mb-3">
            <label for="telephone" className="form-label">Téléphone</label>
            <input type="text" className="form-control" id="telephone"></input>
          </div>
          <div className="mb-3">
            <label for="nombreVoyageur" className="form-label">Nombre de voyageur</label>
            <input type="text" className="form-control" id="nombreVoyageur"></input>
          </div>
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Message</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>
          <button type="submit" className="btn btn-primary center-block">Envoyer</button>
        </form>
        </div>
      </div>
    </div>
    <Footer />
    </>
  );
}
