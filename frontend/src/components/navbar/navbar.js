import Link from "next/link";
import "./navbar.css";

export default function Navbar() {
  const brand = "Brand";

  return (
    <div className="navbar">
      <Link href="/" className="logo">
        {brand}
      </Link>
      <nav>
        <ul className="navigation">
          <li>
            <Link href="/accueil">accueil</Link>
            <Link href="/voyages">voyages</Link>
            <Link href="/contact">contact</Link>
          </li>
        </ul>
      </nav>
    </div>
  );
}
