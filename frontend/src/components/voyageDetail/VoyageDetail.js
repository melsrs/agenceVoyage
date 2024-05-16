"use client";

import "./voyageDetail.css";

export default function VoyageDetail({
  nom,
  image,
  prix,
  datedepart,
  datearrivee,
  description,
  moyentransport,
  pays,
  categorie,
}) {
  return (
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
        <p className="voyageNom">{nom} </p>
        <p className="voyageDescription">{description}</p>
      </div>

      <div className="voyageDetail">
        <p className="intitule">Pays</p>
        <p className="voyagePays">{pays}</p>

        <p className="intitule">Date de départ</p>
        <p className="voyageDateDepart">{datedepart}</p>

        <p className="intitule">Date de retour</p>
        <p className="voyageDateArrivee">Date de retour {datearrivee}</p>

        <p className="intitule">Moyen de transport </p>
        <p className="voyageMoyenTransport">{moyentransport}</p>

        <p className="intitule">Catégorie</p>
        <p className="voyageCategorie">Catégorie {categorie}</p>

        <p className="intitule">Prix</p>
        <p className="voyagePrix">Prix {prix}</p>
      </div>
    </div>
  );
}
