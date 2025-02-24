import React, { FC } from 'react'
import { Figure } from '../models/figures/Figure'

interface LostFiguresdProps {
  title: string
  figures: Figure[]
}

const LostFigures: FC<LostFiguresdProps> = ({ title, figures }) => {
  return (
    <div className="lost">
      <h3>{title}</h3>
      {figures.map((figure) => (
        <div className="lost__figure" key={figure.id}>
          {figure.name}{' '}
          {figure.logo && <img width={20} height={20} src={figure.logo} />}
        </div>
      ))}
    </div>
  )
}

export default LostFigures
