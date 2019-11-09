const initialState = { selectedLieu: null }

function setLieu(state = initialState, action) {
  let nextState
  switch (action.type) {
    case 'SET_LIEU':
      nextState = {
        ...state,
        selectedLieu: action.value
      }
      return nextState || state
  default:
    return state
  }
}

export default setLieu
