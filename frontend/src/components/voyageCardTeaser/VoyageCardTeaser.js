"use client"

import "./voyageCardTeaser.css";

export default function VoyageCardTeaser({nom,pays,image, prix, categorie}) {
  return (
    <div className="voyageCard">
    <div className="voyageCardInformation">
      <p className="voyageCardName">{nom}</p>
      <p className="voyageCardPays">{pays}</p>
      <p className="voyageCardPrix">{prix} € </p>

      {image && (
      <img
        className="voyageCardImage"
        width={250}
        height={250}
        src={image}
        alt={"Image de " + nom}
      />
    )}
      <p className="voyageCardCategorie">Catégorie : {categorie}</p>
    </div>



  </div>
  );
}
