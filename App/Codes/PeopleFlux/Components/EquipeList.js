import React from 'react'
import { StyleSheet, FlatList } from 'react-native'
import { EquipeItem } from './EquipeItem'
import { equipeData } from '../Helpers/EquipeData'


class EquipeList extends React.Component {

  constructor(props) {
      super(props)
  }

  render() {
    return (
        <FlatList
          style={styles.list}
          data={members}
          keyExtractor={(item) => item.id.toString()}
          renderItem={({item}) => <EquipeItem membre={item}/>}
          )}
        />

    )
  }
}

const styles = StyleSheet.create({
  list: {
    flex: 1
  }
})

export default EquipeList
