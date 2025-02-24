import React from 'react';

const RadioButtonGroup = ({ options, handleDifficultyChange, selected }) => {
  return (
    <div className='radio-button-group'>
      {options.map((option, index) => (
        <button
          key={index}
          type='button'
          className={option.value === selected ? 'active' : ''}
          onClick={() => handleDifficultyChange(option)}
          disabled={option.isDisabled}
        >
          {option.label}
        </button>
      ))}
    </div>
  );
};

export default RadioButtonGroup;