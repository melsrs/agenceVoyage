"use client"

import "./voyageCardTeaser.css";
import Image from "next/image";

export default function VoyageCardTeaser(props) {
  return (
    <div className="voyageCard">
    <div className="voyageCardInformation">
      <p className="voyageCardName">{props.name}</p>
      <p className="voyageCardPays">{props.pays}</p>
    </div>
    {props.image && (
      <Image
        className="voyageCardImage"
        width={250}
        height={250}
        src={props.image}
        alt={"Image de " + props.nom}
      />
    )}
  </div>
  );
}
