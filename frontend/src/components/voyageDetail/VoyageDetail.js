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
            width={250}
            height={250}
            src={image}
            alt={"Image de " + nom}
          />
        )}
        <p className="voyageNom">{nom}</p>
        <p className="voyageDescription">{description}</p>
      </div>

      <div className="voyageDetail">
        <p className="voyagePays">Pays {pays}</p>
        <p className="voyageDateDepart">Date de départ {datedepart}</p>
        <p className="voyageDateArrivee">Date de retour {datearrivee}</p>
        <p className="voyageMoyenTransport">
          Moyen de transport {moyentransport}
        </p>
        <p className="voyageCategorie">Catégorie {categorie}</p>
        <p className="voyagePrix">Prix {prix}</p>
      </div>
    </div>
  );
}
